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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/filaments', 'HomeController@filaments')->name('filaments');
Route::get('/filament/create', 'HomeController@filamentAdd')->name('filamentCreateForm');
Route::post('/filament/create', 'HomeController@filamentCreate')->name('filamentCreate');
Route::get('/printers', 'HomeController@myPrinters')->name('myPrinters');

// OAuth Routes
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
