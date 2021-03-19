<?php

namespace App\Http\Controllers\SIM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\laporan_kehilangan_sim;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengguna.pages.sim.laporan_kehilangan_sim', [
            'title' => 'Laporan Kehilangan SIM'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required'],
            'ttl' => ['required'],
            'pekerjaan' => ['required'],
            'alamat_tinggal' => ['required'],
            'no_sim' => ['required'],
            'no_regis' => ['required'],
            'tgl_awal' => ['required'],
            'tgl_akhir' => ['required'],
        ]);

        $laporankehilangan = new laporan_kehilangan_sim;
        $laporankehilangan->no_regis = $request->no_regis;
        $laporankehilangan->nama = $request->nama;
        $laporankehilangan->ttl = $request->ttl;
        $laporankehilangan->pekerjaan = $request->pekerjaan;
        $laporankehilangan->alamat_tinggal = $request->alamat_tinggal;
        $laporankehilangan->no_sim = $request->no_sim;
        $laporankehilangan->no_regis = $request->no_regis;
        $laporankehilangan->tgl_awal = $request->tgl_awal;
        $laporankehilangan->tgl_akhir = $request->tgl_akhir;
        // $laporankehilangan->file = $request->file;
        $laporankehilangan->save();

        return redirect()->route('kehilanganSIM.index')->with('success', 'Laporan Kehilangan SIM Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
