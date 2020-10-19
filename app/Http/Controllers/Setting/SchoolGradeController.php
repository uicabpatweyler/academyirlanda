<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchoolGrade;
use App\Http\Requests\UpdateSchoolGrade;
use App\Models\Setting\School;
use App\Models\Setting\SchoolGrade;
use Illuminate\Http\Request;

class SchoolGradeController extends Controller
{
    public function __construct()
    {
      $this->authorizeResource(SchoolGrade::class,'school_grade');
    }

  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $schools = School::status(true)->get();
      $schoolGrades = SchoolGrade::query()
        ->when(request('school'), function($query, $school) {
          $query->where('school_id', $school);
        }, function ($query) {
          $query->where('school_id', 0);
        })
        ->orderBy('created_at')
        ->paginate();

        return response()
          ->view('setting.schoolgrades.index',
            [
              'schools' => $schools,
              'schoolGrades' => $schoolGrades
            ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $schools = School::status(true)->get();
      return response()
        ->view('setting.schoolgrades.create',['schools' => $schools],200);
    }

    public function store(StoreSchoolGrade $request)
    {
        $request->createSchoolGrade();
        return response()
          ->json([
            'message' => 'El grado escolar se ha creado correctamente.',
            'url' => route('school_grades.index')
          ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting\SchoolGrade  $schoolGrade
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolGrade $schoolGrade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting\SchoolGrade  $schoolGrade
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolGrade $schoolGrade)
    {
      $schools = School::status(true)->get();
      return response()
        ->view('setting.schoolgrades.edit',
          ['schools' => $schools, 'schoolGrade' => $schoolGrade],200);

    }

    public function update(UpdateSchoolGrade $request, SchoolGrade $schoolGrade)
    {
      $request->updateSchoolGrade($schoolGrade);
      return response()
        ->json([
          'message' => 'El grado escolar se ha actualizado correctamente.',
          'url' => route('school_grades.index')
        ]);
    }

    public function delete(SchoolGrade $schoolGrade)
    {
      $this->authorize('delete', $schoolGrade);
      $schoolGrade->delete();
      return response()
        ->json([
          'message' => 'El grado escolar se ha borrado correctamente.',
          'url' => route('school_grades.index')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting\SchoolGrade  $schoolGrade
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolGrade $schoolGrade)
    {
        //
    }

    public function getGradesBySchool($schoolId)
    {
      $schoolGrades = SchoolGrade::query()
        ->where('school_id', '=', $schoolId)
        ->select(['id as value','name as text'])
        ->get()
        ->toArray();

      array_unshift($schoolGrades, ['value' => '', 'text' => '[Elija un grado]']);

      return $schoolGrades;
    }
}
