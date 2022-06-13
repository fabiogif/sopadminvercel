<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* |-------------------------------------------------------------------------- | API Routes |-------------------------------------------------------------------------- | | Here is where you can register API routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | is assigned the "api" middleware group. Enjoy building your API! | */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/tenants/{uuid}', [App\Http\Controllers\Api\TenantApiController::class , 'show']);
Route::get('/tenants', [App\Http\Controllers\Api\TenantApiController::class , 'index']);
Route::post('/client', [App\Http\Controllers\Api\Auth\RegisterController::class , 'store']);

Route::get('/occurrences', [App\Http\Controllers\Api\OccurrenceApiController::class , 'index']);
Route::get('/occurrences/{uuid}', [App\Http\Controllers\Api\OccurrenceApiController::class , 'show']);
//Route::post('/occurrences', [App\Http\Controllers\Api\OccurrenceApiController::class , 'store']);

Route::post('/occurrences', [App\Http\Controllers\Api\OccurrenceApiController::class , 'createNewOccurrence']);
