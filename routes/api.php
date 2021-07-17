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

Route::group([
    'middleware' => 'api',
    'prefix'     => 'pub'
], function ($router) {
	

//Registration
Route::resource('v1/runner', 'v1\RunnerController');
Route::post('v1/sendmsg', 'v1\RunnerController@sendmsg');
	

//Location
Route::resource('v1/regions', 'v1\RegionController');
Route::resource('v1/countries', 'v1\CountryController');
	



});