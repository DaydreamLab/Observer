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

//Route::group(['middleware' => ['api', 'auth:api', 'expired', 'admin'], 'prefix' => 'api/admin'], function () {
//    Route::group(['prefix' => 'log'], function () {
//        Route::post('search', 'DaydreamLab\Observer\Controllers\Log\LogController@search');
//        //Route::get('{id}', 'DaydreamLab\Observer\Controllers\Log\LogController@getItem');
//    });
//
//    Route::group(['prefix' => 'search'], function () {
//        Route::post('keywordlist', 'DaydreamLab\Observer\Controllers\Search\Admin\SearchAdminController@keywordList');
//    });
//
//});
//
//Route::group(['middleware' => ['api'], 'prefix' => 'api'], function () {
//    Route::post('search', 'DaydreamLab\Observer\Controllers\Search\Front\SearchFrontController@search');
//    Route::get('visitorcounter', 'DaydreamLab\Observer\Controllers\Unique\Front\UniqueVisitorCounterFrontController@getVisitorCounter');
//});
