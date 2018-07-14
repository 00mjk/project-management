<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/projects');

Route::prefix('/projects')->name('project.')->group(function () {
    Route::get('/', 'ProjectController@index')->name('index');
    Route::get('/trashed', 'ProjectController@trashed')->name('trashed');
    Route::get('/create', 'ProjectController@create')->name('create');
    Route::post('/store', 'ProjectController@store')->name('store');
    Route::get('/{editable_project}', 'ProjectController@show')->name('show');
    Route::get('/{editable_project}/edit', 'ProjectController@edit')->name('edit');
    Route::put('/{editable_project}', 'ProjectController@update')->name('update');
    Route::put('/{editable_project}/restore', 'ProjectController@restore')->name('restore');
    Route::delete('/{editable_project}', 'ProjectController@destroy')->name('destroy');
    Route::delete('/{editable_project}/force_delete', 'ProjectController@forceDelete')->name('force_delete');
});

Route::prefix('/people')->name('person.')->group(function () {
    Route::get('/', 'PersonController@index')->name('index');
    Route::get('/trashed', 'PersonController@trashed')->name('trashed');
    Route::get('/create', 'PersonController@create')->name('create');
    Route::post('/store', 'PersonController@store')->name('store');
    Route::get('/{editable_person}', 'PersonController@show')->name('show');
    Route::get('/{editable_person}/edit', 'PersonController@edit')->name('edit');
    Route::put('/{editable_person}', 'PersonController@update')->name('update');
    Route::put('/{editable_person}/restore', 'PersonController@restore')->name('restore');
    Route::delete('/{editable_person}', 'PersonController@destroy')->name('destroy');
    Route::delete('/{editable_person}/force_delete', 'PersonController@forceDelete')->name('force_delete');
});

Route::prefix('/roles')->name('role.')->group(function () {
    Route::get('/', 'RoleController@index')->name('index');
    Route::get('/create', 'RoleController@create')->name('create');
    Route::post('/store', 'RoleController@store')->name('store');
    Route::get('/{role}', 'RoleController@show')->name('show');
    Route::get('/{role}/edit', 'RoleController@edit')->name('edit');
    Route::delete('/{role}', 'RoleController@destroy')->name('destroy');
    Route::put('/{role}', 'RoleController@update')->name('update');
});