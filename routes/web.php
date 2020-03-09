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
    return view('index');
});

Route::get('send', '\App\Http\Controllers\QueueController@sendMessage');
Route::get('get', '\App\Http\Controllers\QueueController@getMessages');
Route::get('getFlight', '\App\Http\Controllers\FlightController@getFlight');
Route::get('getAirports', '\App\Http\Controllers\FlightController@getAirports');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
