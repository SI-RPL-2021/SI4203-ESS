<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SIMController;
use App\Http\Controllers\STNKController;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'landing_page'])->name('landingpage');

Route::group(['middleware' => ['auth']], function () {
    Route::get('home', [App\Http\Controllers\RolesController::class, 'index'])->name('home');
    Route::get('laporan_kehilangan_sim', [App\Http\Controllers\SIMController::class, 'sim'])->name('laporan_kehilangan_sim');
    Route::get('laporan_kehilangan_stnk', [App\Http\Controllers\STNKController::class, 'stnk'])->name('laporan_kehilangan_stnk');
});
