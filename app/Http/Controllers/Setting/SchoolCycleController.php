<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchoolCycle;
use App\Models\Setting\SchoolCycle;
use Illuminate\Http\Request;

class SchoolCycleController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $cycles = SchoolCycle::status(true)->get();
        return response()
            ->view('setting.schoolcycles.index',['cycles'=> $cycles],200);
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

    public function update(Request $request, SchoolCycle $schoolCycle)
    {
        //
    }

    public function destroy(SchoolCycle $schoolCycle)
    {
        //
    }
}
