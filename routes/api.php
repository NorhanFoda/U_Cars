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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//services routes
Route::resource('/', 'ServiceController');
Route::resource('/services', 'ServiceController');

//sub_services routes
Route::group(['prefix' => 'services'], function(){
    Route::resource('/{service}/sub_services', 'SubServiceController');
});

Route::get('/sub_services', 'SubServiceController@getAllSubServices');
