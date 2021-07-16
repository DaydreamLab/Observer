<?php

use DaydreamLab\Observer\Controllers\RequestLog\Admin\RequestLogAdminController;

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

Route::post('api/admin/request/log/search', [RequestLogAdminController::class, 'search'])->middleware(['expired', 'admin']);
Route::get('api/admin/request/log/{id}}', [RequestLogAdminController::class, 'getItem'])->middleware(['expired', 'admin']);
