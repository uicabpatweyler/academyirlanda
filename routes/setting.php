<?php
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

Route::catch(function () {
    throw new NotFoundHttpException;
});

Route::resource('schools', 'SchoolController');
Route::resource('school_cycles','SchoolCycleController');
Route::resource('school_grades','SchoolGradeController');
Route::resource('school_fees','SchoolFeeController');
Route::resource('school_groups','SchoolGroupController');

Route::patch('/schools/delete/{school}', 'SchoolController@delete')
    ->name('schools.delete');
Route::patch('/school_cycles/delete/{school_cycle}', 'SchoolCycleController@delete')
    ->name('school_cycles.delete');
Route::patch('/school_grades/delete/{school_grade}','SchoolGradeController@delete')
  ->name('school_grades.delete');
Route::patch('/school_fees/delete/{school_fee}', 'SchoolFeeController@delete')
  ->name('school_fees.delete');
Route::patch('/school_groups/delete/{school_group}','SchoolGroupController@delete')
  ->name('school_groups.delete');

Route::get('school_level/{schoolType}','SchoolController@schoolLevel')
    ->name('schoolLevel');
Route::get('school_service/{schoolService}','SchoolController@schoolService')
    ->name('schoolService');
Route::get('grades_by_school/{school}', 'SchoolGradeController@getGradesBySchool');
Route::get('filter_school_fees/{school}/{cycle}/{type}','SchoolFeeController@filterSchoolFees')
  ->name('filterSchoolFees');
