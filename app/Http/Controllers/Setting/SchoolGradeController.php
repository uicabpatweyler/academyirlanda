<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchoolGrade;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\Setting\SchoolGrade  $schoolGrade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolGrade $schoolGrade)
    {
        //
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
}
