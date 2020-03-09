<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('cruds', '\App\Http\Controllers\ApiController@index');
Route::put('call/{id}', '\App\Http\Controllers\ApiController@update');
Route::get('get', '\App\Http\Controllers\ApiController@get');
Route::delete('delete', '\App\Http\Controllers\ApiController@delete');
Route::post('create', '\App\Http\Controllers\ApiController@create');
Route::put('update', '\App\Http\Controllers\ApiController@update');


