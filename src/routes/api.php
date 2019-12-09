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

/************************************  前台 API  ************************************/
Route::post('api/search', 'DaydreamLab\Observer\Controllers\Search\Front\SearchFrontController@search');
Route::get('api/visitorcounter', 'DaydreamLab\Observer\Controllers\Unique\Front\UniqueVisitorCounterFrontController@getVisitorCounter');



/************************************  後台 API  ************************************/
Route::post('api/admin/log/search', 'DaydreamLab\Observer\Controllers\Log\LogController@search')
    ->middleware(['expired', 'admin']);

Route::post('api/admin/search/keywordlist', 'DaydreamLab\Observer\Controllers\Search\Admin\SearchAdminController@keywordList')
    ->middleware(['expired', 'admin']);




