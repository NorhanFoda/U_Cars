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

//images routes
Route::group(['prefix' => 'colors'], function(){
    Route::resource('/{color}/images', 'dashboard\ImageController');
});

Route::get('/images', 'dashboard\ImageController@getAllImages');

//classes routes
Route::resource('/classes', 'dashboard\ClassCatController');

Route::group(['prefix' => 'sub_services'], function(){
    Route::get('/{sub_service}/classes', 'dashboard\ClassCatController@getSubServiceClasses');
}); 

//class_types routes
Route::group(['prefix' => 'classes'], function(){
   Route::resource('/{class}/class_types', 'dashboard\ClassTypeController');
});

//post class type for specific subservice
Route::post('/sub_services/{sub_service}/classes/{class}/class_types', 'dashboard\ClassTypeController@postClassTypeForSubservice');
//post class type
Route::post('/classes/{class}/class_types', 'dashboard\ClassTypeController@postClassTypeForClass');

//edit class Type for specific subservice
Route::put('/sub_services/{sub_service}/classes/{class}/class_types', 'dashboard\ClassTypeController@updateClassTypeForSubservice');
//edit class type
Route::put('/classes/{class}/class_types/{class_type}', 'dashboard\ClassTypeController@updateClassTypeForClass');
//delete class type of specific service
Route::delete('/sub_services/{sub_service}/classes/{class}/class_types/{class_type}', 'dashboard\ClassTypeController@deleteClassTypeForService');


