<?php

use App\Http\Controllers\artikelController;
use App\Http\Controllers\Dashboard\Dashboard;
use App\Http\Controllers\faqController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SIM\kehilanganSIM;
use App\Http\Controllers\SIM\pembuatanSIM;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SIM\perpanjanganSIM;
use App\Http\Controllers\STNK\kehilanganSTNK;
use App\Http\Controllers\STNK\pembuatanSTNK;
use App\Http\Controllers\STNK\PerpanjanganStnk;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\feedbackController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\KeranjangController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'landing_page'])->name('landingpage');

Route::group(['middleware' => ['auth']], function () {

    Route::get('dashboard', [Dashboard::class, 'index'])->name('dashboard');
    Route::resource('data-user', UserController::class);
    Route::resource('feedback', feedbackController::class);
    Route::resource('faq', faqController::class);
    Route::resource('article', artikelController::class);
    Route::get('buat-artikel', [artikelController::class, 'upload'])->name('upload');
    Route::post('/artikel/proses', [artikelController::class, 'proses_upload'])->name('proses_upload');
    Route::resource('history', HistoryController::class);

    //user -----------------------
    Route::group(['middleware' => ['role:user']], function () {
    });

    //sim -----------------------
    Route::group(['middleware' => ['role:admin sim|user']], function () {
        Route::resource('pembuatan-sim', pembuatanSIM::class);
        Route::get('/pembuatan-sim/{id}/set', [pembuatanSIM::class, 'status'])->name('pembuatan-sim.status');
        Route::resource('kehilangan-sim', kehilanganSIM::class);
        Route::get('/kehilangan-sim/{id}/download', [kehilanganSIM::class, 'download'])->name('kehilangan-sim.download');
        Route::get('/kehilangan-sim/{id}/set', [kehilanganSIM::class, 'status'])->name('kehilangan-sim.status');
        Route::get('kehilangan-sim/{namafile}/download', [kehilanganSIM::class, 'download'])->name('getFile');
        Route::resource('perpanjangan-sim', perpanjanganSIM::class);
        Route::get('perpanjangan-sim/{id}/set', [perpanjanganSIM::class, 'status'])->name('perpanjangan-sim.status');
    });

    // stnk -----------------------
    Route::group(['middleware' => ['role:admin stnk|user']], function () {
        Route::resource('pembuatan-stnk', pembuatanSTNK::class);
        Route::get('/pembuatan-stnk/{id}/download', [pembuatanSTNK::class, 'download'])->name('pembuatan-stnk.download');
        Route::get('/pembuatan-stnk/{id}/set', [pembuatanSTNK::class, 'status'])->name('pembuatan-stnk.status');
        Route::resource('kehilangan-stnk', kehilanganSTNK::class);
        Route::get('/kehilangan-stnk/{id}/download', [kehilanganSTNK::class, 'download'])->name('kehilangan-stnk.download');
        Route::get('/kehilangan-stnk/{id}/set', [kehilanganSTNK::class, 'status'])->name('kehilangan-stnk.status');
        Route::resource('perpanjangan-stnk', PerpanjanganStnk::class);
        Route::get('perpanjangan-stnk/{id}/set', [perpanjanganStnk::class, 'status'])->name('perpanjangan-stnk.status');
    });

    Route::group(['middleware' => ['role:admin stnk|admin sim']], function () {
        Route::resource('pembayaran', PembayaranController::class)->except('show');
        Route::get('pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
        Route::post('pengaturan', [PengaturanController::class, 'store'])->name('pengaturan.store');
    });

    // persyaratan -----------------------

    Route::get('pengaturan/download-persyaratan-kehilangan-sim', [PengaturanController::class, 'download_persyaratan_kehilangan_sim'])->name('pengaturan.download-persyaratan-kehilangan-sim');
    Route::get('pengaturan/download-persyaratan-kehilangan-stnk', [PengaturanController::class, 'download_persyaratan_kehilangan_stnk'])->name('pengaturan.download-persyaratan-kehilangan-stnk');

    // -----------------------

    Route::get('keranjang/{keranjang:id}/getUser', [KeranjangController::class, 'getUser'])->name('keranjang.getUser');
    Route::get('keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('transaksi/{id}', [TransaksiController::class, 'show'])->name('transaksi.show');
    Route::delete('transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
    Route::get('transaksi/{id}/download', [TransaksiController::class, 'download'])->name('transaksi.download');
    Route::get('transaksi/{id}/set', [TransaksiController::class, 'status'])->name('transaksi.status');

    Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout');

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
