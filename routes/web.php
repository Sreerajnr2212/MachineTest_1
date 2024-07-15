<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;

use App\Http\Controllers\CarModelController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BrandController::class,'index'])->name('brands.logos');

Route::get('brands/logos', [BrandController::class,'logos'])->name('brands.logos');

Route::get('brands/list', [BrandController::class,'index'])->name('brands.index');
Route::get('brands/create', [BrandController::class,'create'])->name('brands.create');
Route::post('brands/save', [BrandController::class,'store'])->name('brands.store');
Route::get('brands/edit/{id}', [BrandController::class,'edit'])->name('brands.edit');
Route::post('brands/update/{id}', [BrandController::class,'update'])->name('brands.update');
Route::delete('brands/delete/{id}', [BrandController::class,'destroy'])->name('brands.destroy');
Route::get('brands/search', [BrandController::class,'search'])->name('brands.search');
Route::get('brands/searchByAlphabetic/{char}', [BrandController::class,'searchByAlphabetic'])->name('brands.searchByAlphabetic');

Route::get('car-models/list', [CarModelController::class,'index'])->name('car-models.index');
Route::get('car-models/create', [CarModelController::class,'create'])->name('car-models.create');
Route::post('car-models/save', [CarModelController::class,'store'])->name('car-models.store');
Route::get('car-models/edit/{id}', [CarModelController::class,'edit'])->name('car-models.edit');
Route::post('car-models/update/{id}', [CarModelController::class,'update'])->name('car-models.update');
Route::delete('car-models/delete/{id}', [CarModelController::class,'destroy'])->name('car-models.destroy');
