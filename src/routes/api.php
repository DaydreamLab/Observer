<?php

use Illuminate\Http\Request;
use DaydreamLab\Observer\Controllers\Log\Admin\LogAdminController;
use DaydreamLab\Observer\Controllers\Unique\Front\UniqueVisitorCounterFrontController;
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

Route::post('api/admin/log/search', [LogAdminController::class, 'search'])
    ->middleware(['expired', 'admin']);

Route::get('api/visitorcounter', [UniqueVisitorCounterFrontController::class, 'getVisitorCounter']);

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
