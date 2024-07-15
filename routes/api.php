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
Route::get('brands', 'App\Http\Controllers\Api\BrandController@index');
Route::get('brands/{id}', 'App\Http\Controllers\Api\BrandController@show');
Route::post('models/store', 'App\Http\Controllers\Api\CarModelController@store');
