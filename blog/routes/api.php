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
    Route::post('automation','API\AutomationController@index');
    Route::post('automation/create','API\AutomationController@store');
    Route::post('automation/show/{id}','API\AutomationController@show');
    Route::post('automation/update/{id}','API\AutomationController@update');
    Route::post('automation/destroy','API\AutomationController@destroy');
    Route::post('automation/schedule','API\AutomationController@schedule');
    Route::post('automation/run/command','API\AutomationController@run');
});
