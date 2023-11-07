<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login','\App\Http\Controllers\Api\UsersController@login');
Route::get('user/{id}','\App\Http\Controllers\Api\UsersController@getProfile');
Route::get('questions/{id}','\App\Http\Controllers\Api\QuestionController@index');
Route::post('survey','\App\Http\Controllers\Api\SurveyController@insert');


