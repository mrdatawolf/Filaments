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
Route::resource('examples','ExamplesController');
Route::resource('issues','IssuesController');
Route::resource('notes','NotesController');
Route::resource('remoteDatum','RemoteDatumController');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('landing');

// OAuth Routes
//Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
//Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
