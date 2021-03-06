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

Route::group(['prefix' => 'public'], function(){
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
    // get services
    Route::get('services', 'API\SubServicesController@get_services');
    //get subservices
    Route::get('services/{id}', 'API\SubServicesController@get_SubServices');
    // get subservice
    Route::get('subservices/{id}', 'API\SubServicesController@get_SubService');
    //get colors
    Route::get('subservice/{id}/colors', 'API\ColorsController@get_colors');
    
    Route::post('color', 'API\ColorsController@Select_color');
    
    //get images
    Route::get('colors/{id}/images', 'API\ColorsController@get_images');
    // get image
    Route::get('image/{id}', 'API\ColorsController@get_image');
    // get classes
    Route::get('subservice/{id}/classes', 'API\ClassCatController@getSubServiceClasses');
    
    Route::post('class', 'API\ClassCatController@select_Class');
    
    Route::get('subservice/{id}/freeservices', 'API\Free_ServicesController@get_freeservices');
    
    Route::post('freeservice', 'API\Free_ServicesController@Select_freeservice');
    
    Route::post('subservice/{id}/request', 'API\ClientRequestController@addToCart');
    
    Route::post('request/{id}/addclient', 'API\ClientController@addClient');
    
    Route::post('request/{id}/discountrequest', 'API\ClientRequestController@discountRequest');
    
    Route::get('requests', 'API\ClientRequestController@get_orders');
    
    Route::delete('request/{id}','API\ClientRequestController@delete_order');
    
    Route::put('request/{id}/image','API\ClientRequestController@change_image');
    
    Route::post('image','API\ColorsController@search_image');
    
    Route::put('client/{id}/edit', 'API\ClientController@updateClient');
    
});