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

Route::group(['prefix' => 'public'], function(){
    
    Route::get('/', function () {
        return view('welcome');
    });
    
    //services routes
    Route::get('/', 'dashboard\ServiceController@index');
    Route::resource('/services', 'dashboard\ServiceController');
    
    //sub_services routes
    Route::group(['prefix' => 'services'], function(){
        Route::resource('/{service}/sub_services', 'dashboard\SubServiceController');
    });
    
    Route::get('/sub_services', 'dashboard\SubServiceController@getAllSubServices');
    Route::get('/sub_services/add', 'dashboard\SubServiceController@AddSubServices');
    Route::post('//sub_services/save', 'dashboard\SubServiceController@SaveAddedSubServices');
    
    //colors routes
    Route::group(['prefix' => 'sub_services'], function(){
        Route::resource('/{sub_service}/colors', 'dashboard\ColorController');
    });
    
    Route::get('/colors', 'dashboard\ColorController@getAllColors');
    
    Route::get('/colors/add', 'dashboard\ColorController@AddColors');
    Route::post('/colors/save', 'dashboard\ColorController@SaveAddedColors');
    
    Route::get('/colors/editColor/{color}', 'dashboard\ColorController@editColors');
    Route::put('/colors/updateColor/{color}', 'dashboard\ColorController@updateColors');
    
    Route::delete('/colors/deleteColor/{color}', 'dashboard\ColorController@deleteColors');
    
    //images routes
    Route::group(['prefix' => 'colors'], function(){
        Route::resource('/{color}/images', 'dashboard\ImageController');
    });
    Route::get('/images', 'dashboard\ImageController@getAllImages');
    Route::get('/images/add', 'dashboard\ImageController@AddImages');
    Route::post('/images/save', 'dashboard\ImageController@SaveAddedImages');
    
    //classes routes
    Route::resource('/classes', 'dashboard\ClassCatController');
    Route::group(['prefix' => 'sub_services'], function(){
        Route::get('/{sub_service}/classes', 'dashboard\ClassCatController@getSubServiceClasses');
    }); 
    
    //class_types routes
    Route::group(['prefix' => 'classes'], function(){
       Route::resource('/{class}/class_types', 'dashboard\ClassTypeController');
    });
    Route::get('/classe_types/add', 'dashboard\ClassTypeController@AddType');
    Route::post('/classe_types/save', 'dashboard\ClassTypeController@SaveAddedType');
    
    //post class type for specific subservice
    Route::post('/sub_services/{sub_service}/classes/{class}/class_types', 'dashboard\ClassTypeController@postClassTypeForSubservice');
    
    //edit class Type for specific subservice
    Route::put('/sub_services/{sub_service}/classes/{class}/class_types', 'dashboard\ClassTypeController@updateClassTypeForSubservice');
    
    //delete class type of specific service
    Route::delete('/sub_services/{sub_service}/classes/{class}/class_types/{class_type}', 'dashboard\ClassTypeController@deleteClassTypeForService');
    
    //clients routes
    Route::get('/clients', 'dashboard\ClientController@getClients');
    Route::group(['prefix' => 'clients'], function(){
        Route::get('/{client}/requests', 'dashboard\ClientController@getClientRequests');
    });
    Route::post('/clients/search', 'dashboard\ClientController@getClientByPhone');
    Route::delete('/clients/deleteClient/{client}', 'dashboard\ClientController@deleteClients');
    
    //free_services routes
    Route::resource('/free_services', 'dashboard\FreeServiceController');
    
    //requests routes
    Route::resource('/requests', 'dashboard\ClientRequestController');
    Route::post('/requests/search', 'dashboard\ClientRequestController@getRequestByNo');
    
    //discount requests routes
    Route::get('/discount_requests', 'dashboard\ClientRequestController@getDiscounRequests');
});















