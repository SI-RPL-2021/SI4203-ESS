<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\STNK\kehilanganSTNK;
use App\Http\Controllers\SIM\kehilanganSIM;


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
    Route::get('laporan_kehilangan_sim', [App\Http\Controllers\SIM\kehilanganSIM::class, 'index'])->name('laporan_kehilangan_sim');
    Route::get('laporan_kehilangan_stnk', [App\Http\Controllers\STNK\kehilanganSTNK::class, 'index'])->name('laporan_kehilangan_stnk');
});
