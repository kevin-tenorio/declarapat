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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors', 'json.response']], function () {

    // public routes
    Route::post('/v2/login', 'App\Http\Controllers\UserApiController@login')->name('login.api');
    Route::get('/v2/declaraciones', 'App\Http\Controllers\DeclaracionApiController@index');

    Route::middleware('auth:api')->group(function () {
        Route::post('/v2/register','App\Http\Controllers\UserApiController@register')->name('register.api');
        Route::post('/v2/logout', 'App\Http\Controllers\UserApiController@logout')->name('logout.api');
    });
});