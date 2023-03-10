<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login','App\Http\Controllers\API\Dashboard\Auth\AuthController@Login');
Route::post('logout','App\Http\Controllers\API\Dashboard\Auth\AuthController@Logout');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::fallback('App\Http\Controllers\API\Dashboard\Auth\AuthController@NotFound');
