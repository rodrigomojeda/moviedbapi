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

Route::post('login', 'API\UserController@login')->name('api.login');

Route::post('register', 'API\UserController@register')->name('api.register');


Route::group(['middleware' => 'auth:api'], function() {
    Route::post('details', 'API\UserController@details');
    Route::post('movies/get','API\MoviedbController@get');
    Route::post('movies/search','API\MoviedbController@search');
    Route::post('movies/create','API\MoviedbController@create');
});
