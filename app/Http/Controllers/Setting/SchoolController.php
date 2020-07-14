<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchool;
use App\Http\Requests\UpdateSchool;
use App\Models\SchoolLevel;
use App\Models\SchoolService;
use App\Models\SchoolType;
use App\Models\Setting\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(School::class, 'school');
    }

    public function index()
    {
        $schools = School::status(true)->get();
        return response()
            ->view('setting.schools.index',['schools' => $schools],200);
    }

    public function create()
    {
        $types = SchoolType::all();
        return response()
            ->view('setting.schools.create',['types' => $types],200);
    }

    public function store(StoreSchool $request)
    {
        $request->createSchool();
        return response()
            ->json([
                'message' => 'La escuela se ha creado correctamente',
                'url' => route('schools.index')
            ]);
    }

    public function show(School $school)
    {
        //
    }

    public function edit(School $school)
    {
        return response()
            ->view('setting.schools.edit',[
                'school' => $school,
                'types'  => SchoolType::all(),
                'levels' => SchoolType::find($school->school_type_id)->levels,
                'services' => SchoolLevel::find($school->school_level_id)->services
            ],200);
    }

    public function update(UpdateSchool $request, School $school)
    {
        $request->updateSchool($school);
        return response()
            ->json([
                'message' => 'Los datos de la escuela se han actualizado correctamente.',
                'url' => route('schools.index')
            ]);
    }

    public function delete(School $school)
    {
        $this->authorize('delete', $school);
        $school->delete();
        return response()
            ->json([
                'message' => 'La escuela se ha borrado correctamente.',
                'url' => route('schools.index')
            ]);
    }

    public function destroy(School $school)
    {
        //
    }

    public function schoolLevel($schoolType)
    {
        $levels = SchoolLevel::where('school_type_id', $schoolType)
            ->select(['id as value','name as text'])
            ->orderBy('id', 'asc')
            ->get()
            ->toArray();

        array_unshift($levels, ['value' => '', 'text' => '']);

        return $levels;
    }

    public function schoolService($schoolLevel)
    {
        $services = SchoolService::where('school_level_id', $schoolLevel)
            ->select(['id as value','name as text'])
            ->orderBy('id', 'asc')
            ->get()
            ->toArray();

        array_unshift($services, ['value' => '', 'text' => '']);

        return $services;
    }
}
