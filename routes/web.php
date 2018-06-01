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
Route::get('/projects/create', 'ProjectController@create')->name('project.create');
Route::post('/projects/store', 'ProjectController@store')->name('project.store');
Route::get('/projects/{project}', 'ProjectController@show')->name('project.show');
Route::get('/projects/{project}/edit', 'ProjectController@edit')->name('project.edit');
Route::put('/projects/{project}', 'ProjectController@update')->name('project.update');
Route::delete('/projects/{project}', 'ProjectController@destroy')->name('project.destroy');

Route::get('/persons', 'PersonController@index')->name('person.index');
Route::get('/persons/trashed', 'PersonController@trashed')->name('person.trashed');
Route::get('/persons/create', 'PersonController@create')->name('person.create');
Route::post('/persons/store', 'PersonController@store')->name('person.store');
Route::get('/persons/{person}', 'PersonController@show')->name('person.show');
Route::get('/persons/{person}/edit', 'PersonController@edit')->name('person.edit');
Route::put('/persons/{person}', 'PersonController@update')->name('person.update');
Route::delete('/persons/{person}', 'PersonController@destroy')->name('person.destroy');