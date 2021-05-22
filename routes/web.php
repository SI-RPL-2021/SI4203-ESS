<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ddashboard;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\adminSIMController;
use App\Http\Controllers\STNK\kehilanganSTNK;
use App\Http\Controllers\STNK\satuTahun;
use App\Http\Controllers\STNK\limaTahun;
use App\Http\Controllers\SIM\kehilanganSIM;
use App\Http\Controllers\SIM\pembuatanSIM;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\VerifDataUserController;
use App\Http\Controllers\SIM\perpanjanganSIM;
use App\Http\Controllers\SIM\SimController;
use App\Http\Controllers\STNK\pembuatanSTNK;
use App\Http\Controllers\ChartController;

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
    Route::resource('pembuatan-sim', pembuatanSIM::class);
    Route::get('/pembuatan-sim/{id}/set', [pembuatanSIM::class, 'status'])->name('pembuatan-sim.status');
    Route::resource('kehilangan-sim', kehilanganSIM::class);
    Route::get('/kehilangan-sim/{id}/set', [kehilanganSIM::class, 'status'])->name('kehilangan-sim.status');
    Route::get('kehilangan-sim/{namafile}/download', [kehilanganSIM::class, 'download'])->name('getFile');
    Route::resource('perpanjangan-sim', perpanjanganSIM::class);
    Route::get('perpanjangan-sim/{id}/set', [perpanjanganSIM::class, 'status'])->name('perpanjangan-sim.status');
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//   });
  Route::get('/dashboard', [ddashboard::class,'index']);
  Route::get('chart', [ChartController::class, 'index']);

    // stnk -----------------------
    Route::resource('pembuatan-stnk', pembuatanSTNK::class);
    Route::get('/pembuatan-stnk/{id}/set', [pembuatanSTNK::class, 'status'])->name('pembuatan-stnk.status');
    Route::resource('kehilangan-stnk', kehilanganSTNK::class);
    Route::get('/kehilangan-stnk/{id}/set', [kehilanganSTNK::class, 'status'])->name('kehilangan-stnk.status');
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
    Route::group(['middleware' => ['auth']], function () {
        Route::get('homeadmin', [App\Http\Controllers\adminSIMController::class, 'index'])->name('homeadmin');
    });
});
