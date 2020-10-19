<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchoolFee;
use App\Http\Requests\UpdateSchoolFee;
use App\Models\Setting\School;
use App\Models\Setting\SchoolCycle;
use App\Models\Setting\SchoolFee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchoolFeeController extends Controller
{
    private function types ()
    {
      return [
        [
          'id' => 1,
          'name' => 'Cuota de Inscripción'
        ],
        [
          'id' => 2,
          'name' => 'Cuota de Colegiatura'
        ]
      ];
    }


    public function __construct()
    {
      $this->authorizeResource(SchoolFee::class, 'school_fee');
    }

    public function index()
    {
      $schools = School::status(true)->get();
      $schoolsCycles = SchoolCycle::status(true)->get();
      $schoolFees = SchoolFee::query()
        ->with(['school','schoolCycle'])
        ->bySchool(request('school'))
        ->byCycle(request('school_cycle'))
        ->byType(request('type'))
        ->byStatus(true)
        ->get();

      return response()
        ->view('setting.fees.index',[
          'schools' => $schools,
          'schoolsCycles' => $schoolsCycles,
          'schoolFees' => $schoolFees,
          'types' => $this->types()
        ],200);
    }

    public function create()
    {
      $schools = School::status(true)->get();
      $cycles = SchoolCycle::status(true)->orderBy('period','desc')->get();
        return response()
          ->view('setting.fees.create',
          [
            'schools' => $schools,
            'cycles' => $cycles,
            'types' => $this->types()
          ],200);
    }


    public function store(StoreSchoolFee $request)
    {
      $request->createSchoolFee();
      return response()
        ->json([
          'message' => 'La cuota escolar se ha creado correctamente',
          'url' => route('school_fees.index')
        ]);
    }

    public function show(SchoolFee $schoolFee)
    {
        //
    }

    public function edit(SchoolFee $schoolFee)
    {
      $schools = School::status(true)->get();
      $cycles = SchoolCycle::status(true)->orderBy('period','desc')->get();
      return response()
        ->view('setting.fees.edit',
          [
            'schools' => $schools,
            'cycles' => $cycles,
            'types' => $this->types(),
            'schoolFee' => $schoolFee
          ],200);
    }

    public function update(UpdateSchoolFee $request, SchoolFee $schoolFee)
    {
      $request->updateSchoolFee($schoolFee);
      return response()
        ->json([
          'message' => 'La cuota escolar se ha actualizado correctamente.',
          'url' => route('school_fees.index')
        ]);
    }

    public function delete(SchoolFee $schoolFee)
    {
      $this->authorize('delete', $schoolFee);
      $schoolFee->delete();
      return response()
        ->json([
          'message' => 'La cuota escolar se ha borrado correctamente.',
          'url' => route('school_fees.index')
        ]);
    }

    public function destroy(SchoolFee $schoolFee)
    {
        //
    }

    /*
     * Route declared in routes/setting.php
     * https://www.mysqltutorial.org/mysql-format-function/
     * filter_school_fees/{school}/{cycle}/{type}
     */
    public function filterSchoolFees($schoolId, $schoolCycleId, $type)
    {
      $schoolFees = SchoolFee::query()
        ->where('school_id','=',$schoolId)
        ->where('school_cycle_id','=',$schoolCycleId)
        ->where('type','=',$type)
        ->select('id as value', DB::raw("CONCAT(name, ' ( $ ',FORMAT(amount,2),' )') as text"))
        ->get()
        ->toArray();

      array_unshift($schoolFees,['value' => '', 'text' => '[Elija una cuota]']);

      return $schoolFees;
    }
}
