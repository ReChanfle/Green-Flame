<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index'])->name('lang');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/filter', [App\Http\Controllers\HomeController::class, 'filter'])->name('filter');
Route::get('/create', [App\Http\Controllers\DiscountsController::class, 'index'])->name('create');
Route::get('/edit', [App\Http\Controllers\DiscountsController::class, 'edit'])->name('edit');
Route::post('/send', [App\Http\Controllers\DiscountsController::class, 'store'])->name('send');
Route::post('/update', [App\Http\Controllers\DiscountsController::class, 'update'])->name('update');
Route::get('/delete', [App\Http\Controllers\DiscountsController::class, 'destroy'])->name('delete');
Route::get('/export', [App\Http\Controllers\DiscountsController::class, 'exportToCsv'])->name('export');
