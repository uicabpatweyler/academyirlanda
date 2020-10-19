<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchoolGroup;
use App\Http\Requests\UpdateSchoolGroup;
use App\Models\Setting\School;
use App\Models\Setting\SchoolCycle;
use App\Models\Setting\SchoolFee;
use App\Models\Setting\SchoolGrade;
use App\Models\Setting\SchoolGroup;
use Illuminate\Http\Request;

class SchoolGroupController extends Controller
{
    public function __construct()
    {
      $this->authorizeResource(SchoolGroup::class, 'school_group');
    }

    public function index()
    {
      $schools = School::status(true)->get();
      $schoolsCycles = SchoolCycle::status(true)->get();
      $schoolGrades = SchoolGrade::status(true)->get();

      $schoolGroups = SchoolGroup::query()
        ->with(['schoolGrade', 'schoolFeeOne', 'schoolFeeTwo'])
        ->bySchool(request('school'))
        ->byCycle(request('school_cycle'))
        ->byGrade(request('school_grade'))
        ->byStatus(request('status'))
        ->get();

      return response()
        ->view('setting.schoolgroups.index',
          [
            'schools' => $schools,
            'schoolsCycles' => $schoolsCycles,
            'schoolGrades' => $schoolGrades,
            'schoolGroups' => $schoolGroups
          ],200);
    }

    public function create()
    {
      $schools = School::status(true)->get();
      $cycles = SchoolCycle::status(true)->orderBy('period','desc')->get();
        return response()
          ->view('setting.schoolgroups.create',
            [
              'schools' => $schools,
              'cycles' => $cycles,
            ],200);
    }

    public function store(StoreSchoolGroup $request)
    {
      $request->createSchoolGroup();
      return response()
        ->json([
          'message' => 'El grupo escolar se ha creado correctamente',
          'url' => route('school_groups.index')
        ],200);
    }

    public function show(SchoolGroup $schoolGroup)
    {
        return false;
    }

    public function edit(SchoolGroup $schoolGroup)
    {
      $schools = School::status(true)->get();
      $schoolGrades = School::find($schoolGroup->school_id)->schoolGrades;
      $cycles = SchoolCycle::status(true)->orderBy('period','desc')->get();
      $schoolFeeOne = $this->schoolFees($schoolGroup->school_id, $schoolGroup->school_cycle_id, 1);
      $schoolFeeTwo = $this->schoolFees($schoolGroup->school_id, $schoolGroup->school_cycle_id, 2);

      return response()
        ->view('setting.schoolgroups.edit',
          [
            'schools' => $schools,
            'cycles' => $cycles,
            'schoolGrades' => $schoolGrades,
            'schoolGroup' => $schoolGroup,
            'schoolFeeOne' => $schoolFeeOne,
            'schoolFeeTwo' => $schoolFeeTwo
          ],200);
    }


    public function update(UpdateSchoolGroup $request, SchoolGroup $schoolGroup)
    {
      $request->updateSchoolGroup($schoolGroup);
      return response()
        ->json([
          'message' => 'El grupo escolar se ha actualizado correctamente.',
          'url' => route('school_groups.index')
        ]);
    }

    public function delete(SchoolGroup $schoolGroup)
    {
      $this->authorize('delete', $schoolGroup);
      $schoolGroup->delete();
      return response()
        ->json([
          'message' => 'El grupo escolar se ha borrado correctamente.',
          'url' => route('school_groups.index')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting\SchoolGroup  $schoolGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolGroup $schoolGroup)
    {
        //
    }

    private function schoolFees($school, $cycle, $type)
    {
      $schoolFee = SchoolFee::query()
        ->where('school_id','=',$school)
        ->where('school_cycle_id','=',$cycle)
        ->where('type','=',$type)
        ->get();

      return $schoolFee;
    }
}
