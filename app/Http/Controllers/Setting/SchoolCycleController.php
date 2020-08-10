<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchoolCycle;
use App\Http\Requests\UpdateSchoolCycle;
use App\Models\Setting\SchoolCycle;
use Illuminate\Http\Request;

class SchoolCycleController extends Controller
{
    public function __construct()
    {
      $this->authorizeResource(SchoolCycle::class,'school_cycle');
    }

    public function index()
    {
        $schoolCycles = SchoolCycle::status(true)->get();
        return response()
            ->view('setting.schoolcycles.index',['schoolCycles'=> $schoolCycles],200);
    }

    public function create()
    {
        return response()
            ->view('setting.schoolcycles.create',[],200);
    }

    public function store(StoreSchoolCycle $request)
    {
        $request->createSchoolCycle();
        return response()
            ->json([
                'message' => 'El ciclo escolar se ha creado correctamente.',
                'url' => route('school_cycles.index')
            ]);
    }

    public function show(SchoolCycle $schoolCycle)
    {
        //
    }

    public function edit(SchoolCycle $schoolCycle)
    {
        return response()
            ->view('setting.schoolcycles.edit',['schoolCycle' => $schoolCycle],200);
    }

    public function update(UpdateSchoolCycle $request, SchoolCycle $schoolCycle)
    {
      $request->updateSchoolCycle($schoolCycle);
      return response()
        ->json([
          'message' => 'Los datos del ciclo escolar se han actualizado correctamente.',
          'url' => route('school_cycles.index')
        ]);
    }

    public function delete(SchoolCycle $schoolCycle)
    {
      $this->authorize('delete', $schoolCycle);
      $schoolCycle->delete();
      return response()
        ->json([
          'message' => 'El ciclo escolar se ha borrado correctamente.',
          'url' => route('school_cycles.index')
        ]);
    }

    public function destroy(SchoolCycle $schoolCycle)
    {
        //
    }
}
