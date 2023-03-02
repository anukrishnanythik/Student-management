<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'courseController@index')->name('home');
Route::post('course.store', 'courseController@store')->name('coursesave');
Route::get('course.edit/{id}', 'courseController@edit')->name('courseedit');
Route::get('course.destroy/{id}', 'courseController@destroy')->name('coursedelete');
Route::get('course.courseactivate/{id}', 'courseController@courseactivate')->name('courseactivate');
Route::get('course.forcedelete/{id}', 'courseController@forcedelete')->name('forcedelete');
Route::post('course.update/{id}', 'courseController@update')->name('courseupdate');

Route::get('student', 'studentController@index')->name('student');
Route::get('student.show/{id}', 'studentController@show')->name('studentshow');
Route::post('student.store', 'studentController@store')->name('studentsave');
Route::get('studentcourse.destroy/{id}', 'studentController@stcoursedestroy')->name('studentdelete');
Route::post('studentdetailupdate/{id}', 'studentController@stdetailupdate')->name('stdetailupdate');

