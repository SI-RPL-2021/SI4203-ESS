<?php

namespace App\Http\Controllers\STNK;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\laporan_kehilangan_stnk;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengguna.pages.stnk.laporan_kehilangan_stnk', [
            'title' => 'Laporan Kehilangan STNK'
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
            'no_regis' => ['required'],
            'merk' => ['required'],
            'type' => ['required'],
            'jenis' => ['required'],
            'model' => ['required'],
            'thn_pembuatan' => ['required'],
            'silinder' => ['required'],
            'nmr_rangka' => ['required'],
            'nmr_mesin' => ['required'],
            'warna_kendaraan' => ['required'],
            'bahan_bakar' => ['required'],
            'warna_tnkb' => ['required'],
            'thn_registrasi' => ['required'],
            'nmr_urut' => ['required'],
            'tgl' => ['required'],
            'apm' => ['required'],
            'nmr_pib' => ['required'],
            'nmr_sut' => ['required'],
            'nmr_tanda_pendaftaran' => ['required'],
            'kepemilikan' => ['required'], // radiobutton
            'alamat_pemilik' => ['required'],
            'kode_pos' => ['required'],
            'nmr_tlpn' => ['required'],
            'nmr_ktp' => ['required'],
            'kitas' => ['required'],
            'baru' => ['nullable'], // checkbox
            'perubahan' => ['nullable'],
            'persyaratan_khusus' => ['nullable'],
            'perpanjangan ' => ['nullable'],
            'file' => ['required'],

        ]);

        $laporankehilangan = new laporan_kehilangan_stnk;
        $laporankehilangan->no_regis = $request->no_regis;
        $laporankehilangan->merk = $request->merk;
        $laporankehilangan->type = $request->type;
        $laporankehilangan->jenis = $request->jenis;
        $laporankehilangan->model = $request->model;
        $laporankehilangan->thn_pembuatan = $request->thn_pembuatan;
        $laporankehilangan->silinder = $request->silinder;
        $laporankehilangan->nmr_rangka = $request->nmr_rangka;
        $laporankehilangan->nmr_mesin = $request->nmr_mesin;
        $laporankehilangan->warna_kendaraan = $request->warna_kendaraan;
        $laporankehilangan->bahan_bakar = $request->bahan_bakar;
        $laporankehilangan->warna_tnkb = $request->warna_tnkb;
        $laporankehilangan->thn_registrasi = $request->thn_registrasi;
        $laporankehilangan->nmr_urut = $request->nmr_urut;
        $laporankehilangan->tgl = $request->tgl;
        $laporankehilangan->apm = $request->apm;
        $laporankehilangan->kepemilikan = $request->kepemilikan; //kacau
        $laporankehilangan->nmr_pib = $request->nmr_pib;
        $laporankehilangan->nmr_sut = $request->nmr_sut;
        $laporankehilangan->nmr_tanda_pendaftaran = $request->nmr_tanda_pendaftaran;
        $laporankehilangan->alamat_pemilik = $request->alamat_pemilik;
        $laporankehilangan->kode_pos = $request->kode_pos;
        $laporankehilangan->nmr_tlpn = $request->nmr_tlpn;
        $laporankehilangan->nmr_ktp = $request->nmr_ktp;
        $laporankehilangan->kitas = $request->kitas;
        $laporankehilangan->baru = implode(",", $request->baru);
        $laporankehilangan->perubahan = implode(",", $request->perubahan); //kacau
        $laporankehilangan->persyaratan_khusus = implode(",", $request->persyaratan_khusus);
        $laporankehilangan->perpanjangan = implode(",", $request->perpanjangan);
        $laporankehilangan->file = $request->file;
        $laporankehilangan->save();

        return redirect()->route('kehilanganSTNK.index')->with('success', 'Laporan Kehilangan STNK Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
    }
}
