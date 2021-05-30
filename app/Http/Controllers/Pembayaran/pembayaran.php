<?php

namespace App\Http\Controllers\Pembayaran;

use App\Http\Controllers\Controller;

class pembayaran extends Controller
{
    public function index()
    {
        return view('pengguna.pages.pembayaran.index', [
            'title' => 'History'
        ]);
    }
}
