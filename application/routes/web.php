<?php

use App\Http\Controllers\DevelopersController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('developers',[DevelopersController::class, 'developers'])->name('developers.developers');
Route::post('developers/create', [DevelopersController::class, 'create'])->name('developers.create');
Route::get('developers/read/{id}', [DevelopersController::class, 'read'])->name('developers.read');
Route::put('developers/update/{id}', [DevelopersController::class, 'update'])->name('developers.update');
Route::get('developer/delete/{id}', [DevelopersController::class,'delete'])->name('developers.delete');
