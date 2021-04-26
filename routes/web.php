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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('student','StudentController');
route::post('student_details/post','StudentController@getPageResult')->name('get.student_details');
route::get('student/restore','StudentController@show')->name('student.restore_view');
route::post('student/restore_list','StudentController@getRestoreResult')->name('get.deleted_values');
route::post('student/{id}/restore','StudentController@restore')->name('student.restore');
Route::post('student/multi-restore','StudentController@multiRestore')->name('student.multi-restore');
Route::post('student/multi-delete','StudentController@multiDelete')->name('student.multi-delete');
Route::get('export', 'StudentController@export')->name('export');
Route::get('importExportView', 'StudentController@importExportView')->name('student.importexport');
Route::post('import', 'StudentController@import')->name('import');
