<?php

namespace App\Http\Controllers\STNK;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class kehilanganSTNK extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pengguna.pages.stnk.laporan_kehilangan_stnk');
    }
}
