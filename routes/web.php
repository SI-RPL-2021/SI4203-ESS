<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\STNK\kehilanganSTNK;
use App\Http\Controllers\STNK\satuTahun;
use App\Http\Controllers\STNK\limaTahun;
use App\Http\Controllers\SIM\kehilanganSIM;
use App\Http\Controllers\SIM\pembuatanSIM;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\VerifDataUserController;

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

    //internal -----------------------'
    Route::resource('verif', VerifDataUserController::class);

    //sim -----------------------
    Route::resource('kehilanganSIM', kehilanganSIM::class);
    Route::resource('buat', pembuatanSIM::class);

    // stnk -----------------------
    Route::resource('kehilanganSTNK', kehilanganSTNK::class);
    Route::resource('satutahun', satuTahun::class);
    Route::resource('limatahun', limaTahun::class);

    Route::resource('HistoryController', HistoryController::class);
    //download file
    Route::get('/download', function () {
        $file = public_path() . "/suratketeranganhilang.pdf";
        if (file_exists($file)) {
            return Response::download($file, "Surat Keterangan Hilang.pdf", ['Content-Type: application/pdf']);
        } else {
            exit('File tidak bisa di download');
        }
    });
});
