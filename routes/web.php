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



Auth::routes();

Route::resource('filaments','filamentController');
Route::resource('printers','printerController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@filaments')->name('landing');

// OAuth Routes
//Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
//Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
