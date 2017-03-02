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
/*
Route::post('/api/box', function (Request $request) {
    return $request->user();
});
*/
Route::post('/box', 'Box@store');
Route::get('/box', 'Box@getAll');