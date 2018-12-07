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
Route::group(['middleware' => ['api', 'auth:api', 'expired', 'admin'], 'prefix' => 'admin'], function () {


    Route::group(['prefix' => 'log'], function () {
        Route::post('search', 'DaydreamLab\Observer\Controllers\Log\LogAdminController@search');
    });
});