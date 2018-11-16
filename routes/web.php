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

//services routes
Route::resource('/', 'dashboard\ServiceController');
Route::resource('/services', 'dashboard\ServiceController');

//sub_services routes
Route::group(['prefix' => 'services'], function(){
    Route::resource('/{service}/sub_services', 'dashboard\SubServiceController');
});

Route::get('/sub_services', 'dashboard\SubServiceController@getAllSubServices');

//colors routes
Route::group(['prefix' => 'sub_services'], function(){
    Route::resource('/{sub_service}/colors', 'dashboard\ColorController');
});

Route::get('/colors', 'dashboard\ColorController@getAllColors');

