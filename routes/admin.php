<?php
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

Route::catch(function () {
    throw new NotFoundHttpException;
});

Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');
Route::resource('users', 'UserController');

Route::patch('/roles/delete/{role}', 'RoleController@delete')
    ->name('roles.delete');
Route::patch('/users/delete/{user}', 'UserController@delete')
    ->name('users.delete');
Route::post('/roles/restore/{roleId}', 'RoleController@restore')
    ->name('roles.restore');

