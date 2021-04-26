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

Route::post('/login', 'Auth\LoginController@login');

Route::get('/user', 'Auth\AuthController@user')->middleware('auth:sanctum');
Route::post('/logout', 'Auth\LoginController@logout')->middleware('auth:sanctum');
Route::get('authrequest', 'Auth\AuthController@handleClientAuth')->middleware('auth:sanctum');

Route::get('/lecturers', 'AdminController@getLecturers')->middleware('auth:sanctum');