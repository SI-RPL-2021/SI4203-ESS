<?php

namespace App\Http\Controllers\STNK;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\pembuatan_stnk;

class pembuatanSTNK extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'adminstnk']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengguna.pages.stnk.pembuatanSTNK', [
            'title' => 'Pembuatan STNK'
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
            'nmr_faktur' => ['required'],
            'tgl' => ['required'],
            'apm' => ['required'],
            'nmr_pib' => ['required'],
            'nmr_sut' => ['required'],
            'nmr_tanda_pendaftaran' => ['required'],
            'nama_lengkap_pemilik' => ['required'],
            'alamat_pemilik' => ['required'],
            'kode_pos' => ['required'],
            'nmr_telepon' => ['required'],
            'nmr_ktp' => ['required'],
            'kitas' => ['required'],
            'baru' => ['nullable'], // checkbox
            'perubahan' => ['nullable'],
            'persyaratan_khusus' => ['nullable'],
            'perpanjangan ' => ['nullable'],
            'file' => ['required'],

        ]);

        $pembuatanSTNK = new pembuatan_stnk;
        $pembuatanSTNK->no_reg = $request->no_reg;
        $pembuatanSTNK->merk = $request->merk;
        $pembuatanSTNK->type = $request->type;
        $pembuatanSTNK->jenis = $request->jenis;
        $pembuatanSTNK->model = $request->model;
        $pembuatanSTNK->thn_pembuatan = $request->thn_pembuatan;
        $pembuatanSTNK->silinder = $request->silinder;
        $pembuatanSTNK->nmr_rangka = $request->nmr_rangka;
        $pembuatanSTNK->nmr_mesin = $request->nmr_mesin;
        $pembuatanSTNK->warna_kendaraan = $request->warna_kendaraan;
        $pembuatanSTNK->bahan_bakar = $request->bahan_bakar;
        $pembuatanSTNK->warna_tnkb = $request->warna_tnkb;
        $pembuatanSTNK->thn_registrasi = $request->thn_registrasi;
        $pembuatanSTNK->nmr_urut = $request->nmr_urut;
        $pembuatanSTNK->tgl = $request->tgl;
        $pembuatanSTNK->apm = $request->apm;
        $pembuatanSTNK->nmr_pib = $request->nmr_pib;
        $pembuatanSTNK->nmr_sut = $request->nmr_sut;
        $pembuatanSTNK->nmr_tanda_pendaftaran = $request->nmr_tanda_pendaftaran;
        $pembuatanSTNK->nama_lengkap_pemilik = $request->nama_lengkap_pemilik;
        $pembuatanSTNK->alamat_pemilik = $request->alamat_pemilik;
        $pembuatanSTNK->kode_pos = $request->kode_pos;
        $pembuatanSTNK->nmr_tlpn = $request->nmr_tlpn;
        $pembuatanSTNK->nmr_ktp = $request->nmr_ktp;
        $pembuatanSTNK->kitas = $request->kitas;
        $pembuatanSTNK->baru = implode(",", $request->baru);
        $pembuatanSTNK->perubahan = implode(",", $request->perubahan); //kacau
        $pembuatanSTNK->persyaratan_khusus = implode(",", $request->persyaratan_khusus);
        $pembuatanSTNK->perpanjangan = implode(",", $request->perpanjangan);
        $pembuatanSTNK->file = $request->file;
        $pembuatanSTNK->save();

        return redirect()->route('pembuatanSTNK.index')->with('success', 'Laporan Kehilangan STNK Berhasil Dibuat');
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
