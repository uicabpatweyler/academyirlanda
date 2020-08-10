<?php
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

Route::catch(function () {
    throw new NotFoundHttpException;
});

Route::resource('schools', 'SchoolController');
Route::resource('school_cycles','SchoolCycleController');
Route::patch('/schools/delete/{school}', 'SchoolController@delete')
    ->name('schools.delete');
Route::patch('/school_cycles/delete/{school_cycle}', 'SchoolCycleController@delete')
    ->name('school_cycles.delete');
Route::get('school_level/{schoolType}','SchoolController@schoolLevel')
    ->name('schoolLevel');
Route::get('school_service/{schoolService}','SchoolController@schoolService')
    ->name('schoolService');
