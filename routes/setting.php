<?php
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

Route::catch(function () {
    throw new NotFoundHttpException;
});

Route::resource('schools', 'SchoolController');
Route::get('school_level/{schoolType}','SchoolController@schoolLevel')
    ->name('schoolLevel');
Route::get('school_service/{schoolService}','SchoolController@schoolService')
    ->name('schoolService');