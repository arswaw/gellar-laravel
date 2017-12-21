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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Create a new board
Route::post('/boards', ['uses' => 'BoardController@create']);

// Return a specific board
Route::get('/boards/{id}', ['uses' => 'BoardController@read']);

// Update a board
Route::put('/boards/{id}', ['uses' => 'BoardController@update']);

// Delete a specific board
Route::delete('/boards/{id}', ['uses' => 'BoardController@delete']);

// Return all boards
Route::get('/boards', ['uses' => 'BoardController@get']);