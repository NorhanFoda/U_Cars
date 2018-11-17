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
// get services
Route::get('services', 'API\SubServicesController@get_services');
//get subservices
Route::get('services/{id}', 'API\SubServicesController@get_SubServices');
//get colors
Route::get('colors/{id}', 'API\ColorsController@get_colors');
//get images
Route::get('colors/images/{id}', 'API\ColorsController@get_images');

Route::get('image/{id}', 'API\ColorsController@get_image');
