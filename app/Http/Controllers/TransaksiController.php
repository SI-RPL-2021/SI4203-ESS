<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    public function index()
    {
        if (auth()->user()->roles->pluck('name')->first() !== 'user') {
            $items = Transaksi::latest()->get();
        } else {
            $items = Transaksi::where('user_id', auth()->id())->latest()->get();
        }
        return view('pengguna.pages.transaksi.index', [
            'title' => 'Data Transaksi',
            'items' => $items
        ]);
    }

    public function show($id)
    {
        $item = Transaksi::findOrFail($id);
        return view('pengguna.pages.transaksi.show', [
            'title' => 'Data Transaksi',
            'item' => $item
        ]);
    }

    public function download($id)
    {
        $item = Transaksi::findOrFail($id);
        $mimes = Str::after($item->bukti_pembayaran, '.');
        $filePath = public_path('storage/') . $item->bukti_pembayaran;
        $headers = ['Content-Type:' . $mimes];
        $fileName = 'Bukti Pembayaran' . '-' . $item->kode . '.' . $mimes;

        if (!file_exists($filePath)) {
            return redirect()->back()->with('gagal', 'Download Gagal.');
        }
        return response()->download($filePath, $fileName, $headers);
    }

    public function status($id)
    {
        $item = Transaksi::findOrFail($id);

        $item->status = request('status');
        $item->save();

        return redirect()->back()->with('success', 'Status berhasil diupdate');
    }

    public function destroy($id)
    {
        Transaksi::destroy($id);
        return redirect()->back()->with('success', 'Transaksi berhasil dihapus');
    }
}
