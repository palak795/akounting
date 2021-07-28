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

// Route::view('contact-us','create');

// Route::get('store','ContactController@store')->name('contact.store');

// Route::post('store','ContactController@store')->name('contact.store');

// Route::view('/test','mail.create');

Route::view('/test','mail.search')->name('mail.search');

Route::get('mail-store','BillingController@store')->name('mail.store');

Route::post('mail-store','BillingController@store')->name('mail.store');

// Route::get('get-data','JavascriptController@showView')->name('show.view');

// Route::post('get-data','JavascriptController@search')->name('get.data');



