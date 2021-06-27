<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'bukti_pembayaran' => ['required']
        ]);
        $data = Keranjang::where('user_id', auth()->id());
        $kode = Str::random(5);
        $count = Transaksi::count() + 1;
        $kode = 'TRX' . str_pad($count, 3, "0", STR_PAD_LEFT);
        if (auth()->user()->roles->pluck('name')->first() !== 'user') {
            $user_id = request('user_id');
        } else {
            $user_id = auth()->id();
        }

        $data = Keranjang::where('user_id', $user_id);
        $jumlah_bayar = $data->get()->sum('biaya');
        $bukti_pembayaran = request()->file('bukti_pembayaran')->store('bukti-pembayaran', 'public');
        $transaksi = Transaksi::create([
            'kode' => $kode,
            'nama' => $data->first()->user->name,
            'email' => $data->first()->user->name,
            'jumlah_bayar' => $jumlah_bayar,
            'metode_pembayaran' => request('pembayaran'),
            'bukti_pembayaran' => $bukti_pembayaran,
            'status' => 'MENUNGGU VERIFIKASI',
            'user_id' => $data->first()->user_id
        ]);

        // insert ke transaksi detail
        foreach ($data->get() as $keranjang) {
            $transaksi->details()->create([
                'jenis_layanan' => $keranjang->jenis_layanan,
                'keterangan' => $keranjang->keterangan,
                'jumlah_bayar' => $keranjang->biaya
            ]);
        }

        // hapus semua data keranjang
        Keranjang::where('user_id', $user_id)->delete();

        return redirect()->route('transaksi.index')->with('success', 'Pembayaran berhasil dilakukan, silahkan tunggu admin untuk memverifikasi.');
    }
}
