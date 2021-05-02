<?php

namespace App\Http\Controllers\SIM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\perpanjangan_sim;

class perpanjanganSIM extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'adminsim']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = perpanjangan_sim::latest()->get();
        return view('pengguna.pages.sim.perpanjang.index', [
            'title' => 'Perpanjangan SIM',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'gol_sim' => ['required'],
            'no_sim' => ['required'],
            'masa_berlaku_sim' => ['required'],
            'satpas_penerbit' => ['required'],
            'alamat_email' => ['required'],
            'polda_kedatangan' => ['required'],
            'satpas_kedatangan' => ['required'],
            'alamat_satpas_kedatangan' => ['required'],
            'kwn' => ['required'],
            'nik' => ['required'],
            'nama_lengkap' => ['required'],
            'tinggi' => ['required'],
            'gol_darah' => ['required'],
            'kd_pos' => ['required'],
            'kota' => ['required'],
            'alamat' => ['required'],
            'no_hp' => ['required'],
            'pendidikan' => ['required'],
            'pekerjaan' => ['required'],
            'hubungan' => ['required'],
            'nama_KD' => ['required'],
            'alamat_KD' => ['required'],
            'telepon_KD' => ['required'],
            'nama_ibu_KD' => ['required'],
            'sertif' => ['required'],
        ]);

        $perpanjanganSIM = new perpanjangan_sim;
        $perpanjanganSIM->gol_sim = $request->gol_sim;
        $perpanjanganSIM->no_sim = $request->no_sim;
        $perpanjanganSIM->masa_berlaku_sim = $request->masa_berlaku_sim;
        $perpanjanganSIM->satpas_penerbit = $request->satpas_penerbit;
        $perpanjanganSIM->alamat_email = $request->alamat_email;
        $perpanjanganSIM->polda_kedatangan = $request->polda_kedatangan;
        $perpanjanganSIM->satpas_kedatangan = $request->satpas_kedatangan;
        $perpanjanganSIM->alamat_satpas_kedatangan = $request->alamat_satpas_kedatangan;
        $perpanjanganSIM->kwn = $request->kwn;
        $perpanjanganSIM->nik = $request->nik;
        $perpanjanganSIM->nama_lengkap = $request->nama_lengkap;
        $perpanjanganSIM->tinggi = $request->tinggi;
        $perpanjanganSIM->gol_darah = $request->gol_darah;
        $perpanjanganSIM->kd_pos = $request->kd_pos;
        $perpanjanganSIM->kota = $request->kota;
        $perpanjanganSIM->alamat = $request->alamat;
        $perpanjanganSIM->no_hp = $request->no_hp;
        $perpanjanganSIM->pendidikan = $request->pendidikan;
        $perpanjanganSIM->pekerjaan = $request->pekerjaan;
        $perpanjanganSIM->hubungan = $request->hubungan;
        $perpanjanganSIM->nama_KD = $request->nama_KD;
        $perpanjanganSIM->alamat_KD = $request->alamat_KD;
        $perpanjanganSIM->telepon_KD = $request->telepon_KD;
        $perpanjanganSIM->nama_ibu_KD = $request->nama_ibu_KD;
        $perpanjanganSIM->sekolah_mengemudi = $request->sekolah_mengemudi;
        $perpanjanganSIM->save();

        return redirect()->route('buat.index')->with('success', 'Perpanjangan SIM akan segera di proses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * 
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
