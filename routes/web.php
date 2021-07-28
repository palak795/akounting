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
// Route::Resource('account','AccountController');
// Route::Resource('company','CompanyController');
// Route::resource('computer','ComputerController');
 // Route::get('create-step1','ComputerController@createStep1')->name('create.step1');
// Route::get('create-step2','ComputerController@createStep2')->name('create.step2');
// Route::get('create-step3','ComputerController@createStep3')->name('create.step3');

 // Route::post('store-step1','ComputerController@storeStep1')->name('store.step1');
// Route::post('store-step2','ComputerController@storeStep2')->name('store.step2');
// Route::post('store-step3','ComputerController@storeStep3')->name('store.step3');

// Route::post('computers_details/post','ComputerController@getPageResult')->name('get.computers_details');

// Route::get('computers/restore','ComputerController@show')->name('computers.restore_view');

// Route::post('computers/restore_list','ComputerController@getRestoreResult')->name('get.deleted_values');

// Route::post('computers/{id}/restore','ComputerController@restore')->name('computers.restore');

// Route::post('computers/multi-restore','ComputerController@multiRestore')->name('computers.multi-restore');

// Route::post('computers/multi-delete','ComputerController@multiDelete')->name('computers.multi-delete');

// Route::get('export', 'ComputerController@export')->name('export');

// Route::get('importExportView', 'ComputerController@importExportView')->name('computers.import-export');

//  Route::post('import', 'ComputerController@import')->name('import');


// Route::get('calculator','CalculatorController@create')->name('calculator.create');
// Route::post('calculate','CalculatorController@calculate')->name('calculator.calculate');

// Route::get('create-step1','CompanyController@createStep1')->name('create.step1');
// Route::post('store-step1','CompanyController@storeStep1')->name('store.step1');

// Route::get('create-step2','CompanyController@createStep2')->name('create.step2');
// Route::post('store-step2','CompanyController@storeStep2')->name('store.step2');

// Route::get('create-step3','CompanyController@createStep3')->name('create.step3');
// Route::post('store-step3','CompanyController@storeStep3')->name('store.step3');

// Route::post('company_details/post','CompanyController@getPageResult')->name('get.company_details');

// Route::get('company/restore','CompanyController@show')->name('company.restore_view');

// Route::post('company/restore_list','CompanyController@getRestoreResult')->name('get.deleted_values');

// Route::post('company_details/{id}/restore','CompanyController@restore')->name('company.restore');

//  Route::post('company/multi-restore','CompanyController@multiRestore')->name('company.multi-restore');

//  Route::post('company/multi-delete','CompanyController@multiDelete')->name('company.multi-delete');

// Route::get('create','AccountController@create')->name('create');

// Route::post('store','AccountController@store')->name('store');

// Route::post('account_details/post','AccountController@getPageResult')->name('get.account_details');

Route::Resource('post','PostController');

Route::get('create','PostController@create')->name('create');

Route::post('store','PostController@store')->name('store');

Route::post('post_details/post','PostController@getPageResult')->
name('get.post_details');

Route::post('store-Comment','PostController@storeComment')->name('store.Comment');
// Route::get('/post/show/{id}', 'PostController@show')->name('post.show');