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

Route::resource('users','UserController');
Route::resource('filaments','FilamentController');
Route::resource('printers','PrinterController');
Route::resource('brands','BrandController');
Route::resource('types','TypeController');
Route::resource('temperatures','TemperatureController');
Route::resource('speeds','SpeedController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('landing');

Route::get('users/{id}/printers', 'UserController@printers');
Route::get('users/{id}/filaments', 'UserController@filaments');

// OAuth Routes
//Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
//Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
