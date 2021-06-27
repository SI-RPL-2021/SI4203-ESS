<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        if (auth()->user()->roles->pluck('name')->first() !== 'user') {
            $items = Keranjang::latest()->get();
            return view('pengguna.pages.keranjang.index', [
                'title' => 'Data Keranjang',
                'items' => $items
            ]);
        } else {
            $items = Keranjang::where('user_id', auth()->id())->latest()->get();
            $data_pembayaran = Pembayaran::orderBy('nama', 'ASC')->get();
            return view('pengguna.pages.keranjang.user-index', [
                'title' => 'Data Keranjang',
                'items' => $items,
                'data_pembayaran' => $data_pembayaran
            ]);
        }
    }

    public function getUser($user_id)
    {
        $count = Keranjang::where('user_id', $user_id)->sum('biaya');
        return response()->json([
            'count' => $count,
            'user_id' => $user_id
        ]);
    }
}
