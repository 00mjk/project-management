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

Route::get('/projects', 'ProjectController@index')->name('project.index');
Route::get('/projects/trashed', 'ProjectController@trashed')->name('project.trashed');
Route::get('/projects/create', 'ProjectController@create')->name('project.create');
Route::post('/projects/store', 'ProjectController@store')->name('project.store');
Route::get('/projects/{editable_project}', 'ProjectController@show')->name('project.show');
Route::get('/projects/{editable_project}/edit', 'ProjectController@edit')->name('project.edit');
Route::put('/projects/{editable_project}', 'ProjectController@update')->name('project.update');
Route::delete('/projects/{editable_project}', 'ProjectController@destroy')->name('project.destroy');
Route::delete('/projects/{editable_project}/force_delete', 'ProjectController@forceDelete')->name('project.force_delete');
Route::put('/projects/{editable_project}/restore', 'ProjectController@restore')->name('project.restore');

Route::get('/people', 'PersonController@index')->name('person.index');
Route::get('/people/trashed', 'PersonController@trashed')->name('person.trashed');
Route::get('/people/create', 'PersonController@create')->name('person.create');
Route::post('/people/store', 'PersonController@store')->name('person.store');
Route::get('/people/{editable_person}', 'PersonController@show')->name('person.show');
Route::get('/people/{editable_person}/edit', 'PersonController@edit')->name('person.edit');
Route::put('/people/{editable_person}', 'PersonController@update')->name('person.update');
Route::delete('/people/{editable_person}', 'PersonController@destroy')->name('person.destroy');
Route::delete('/people/{editable_person}/force_delete', 'PersonController@forceDelete')->name('person.force_delete');
Route::put('/people/{editable_person}/restore', 'PersonController@restore')->name('person.restore');