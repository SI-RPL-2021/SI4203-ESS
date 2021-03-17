<?php

namespace App\Http\Controllers\SIM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class kehilanganSIM extends Controller
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
        return view('pengguna.pages.sim.laporan_kehilangan_sim');
    }

    public function store(Request $request)
    {
        $request->validate([]);
        $data = $request->all();


        return redirect()->route('laporan_kehilangan_sim.index')->with('success', 'Kendaraan Berhasil Ditambahkan.');
    }
}
