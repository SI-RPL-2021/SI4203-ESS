<?php

namespace App\Http\Controllers\STNK;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\perpanjangan_pajak;

class perpanjanganPajak extends Controller
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
        return view('pengguna.pages.stnk.perpanjanganPajak5', [
            'title' => 'Perpanjangan Pajak'
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
            'no_regis' => ['required', 'unique:perpanjangan_pajak5,no_regis'],
            'jenis_surat' => ['required'],
            'jenis_permohonan' => ['required'],
            'status' => ['required'],
            'nm_lngkp' => ['required'],
            'kebangsaan' => ['required'],
            'asal' => ['required'],
            'pass' => ['required'],
            'kims' => ['required'],
            'alamat' => ['required'],
            'hukum' => ['required'],
            'alamat_hukum' => ['required'],
            'akte' => ['required'],
            'kuasa' => ['required'],
            'alamat_kuasa' => ['required'],
            'npwp' => ['required'],
            'ke' => ['required'],
            'fungsi' => ['required'],
            'bahan_bakar' => ['required'],
            'negara_asal' => ['required'], 
            'merk' => ['required'],
            'thn_pembuatan' => ['required'],
            'Silinder' => ['required'],
            'no_rangka' => ['required'],
            'no_mesin' => ['required'],
            'mesintype' => ['required'], 
            'warna' => ['required'],
            'Kemudi' => ['required'],
            'Sumbu ' => ['required'],
            'roda' => ['required'],
            'TNKB' => ['required'],
            'jml_pintu' => ['required'],
            'penumpang' => ['required'],
            'bpkb ' => ['required'],
            'regist_bpkb' => ['required'],
            'import' => ['required'],
            'pengambilan' => ['required'],
            'metode_pembayaran' => ['required'],
            'jenis_pelayanan' => ['required'],

        ]);

        $perpanjanganPajak = new perpanjangan_pajak5;
        $perpanjanganPajak->no_regis = $request->no_regis;
        $perpanjanganPajak->jenis_surat = $request->jenis_surat;
        $perpanjanganPajak->jenis_permohonan = $request->jenis_permohonan;
        $perpanjanganPajak->status = $request->status;
        $perpanjanganPajak->nm_lngkp = $request->nm_lngkp;
        $perpanjanganPajak->kebangsaan = $request->kebangsaan;
        $perpanjanganPajak->asal = $request->asal;
        $perpanjanganPajak->pass = $request->pass;
        $perpanjanganPajak->kims = $request->kims;
        $perpanjanganPajak->alamat = $request->alamat;
        $perpanjanganPajak->hukum = $request->hukum;
        $perpanjanganPajak->alamat_hukum = $request->alamat_hukum;
        $perpanjanganPajak->akte = $request->akte;
        $perpanjanganPajak->kuasa = $request->kuasa;
        $perpanjanganPajak->alamat_kuasa = $request->alamat_kuasa;
        $perpanjanganPajak->npwp = $request->npwp;
        $perpanjanganPajak->ke = $request->ke;
        $perpanjanganPajak->fungsi = $request->fungsi; 
        $perpanjanganPajak->bahan_bakar = $request->bahan_bakar;
        $perpanjanganPajak->negara_asal = $request->negara_asal;
        $perpanjanganPajak->merk = $request->merk;
        $perpanjanganPajak->thn_pembuatan = $request->thn_pembuatan;
        $perpanjanganPajak->Silinder = $request->Silinder;
        $perpanjanganPajak->no_rangka = $request->no_rangka;
        $perpanjanganPajak->no_mesin = $request->no_mesin;
        $perpanjanganPajak->mesintype = $request->mesintype;
        $perpanjanganPajak->warna = $request->warna;
        $perpanjanganPajak->Kemudi = $request->Kemudi;
        $perpanjanganPajak->Sumbu = $request->Sumbu; 
        $perpanjanganPajak->roda = $request->roda;
        $perpanjanganPajak->TNKB = $request->TNKB;
        $perpanjanganPajak->jml_pintu = $request->jml_pintu;
        $perpanjanganPajak->penumpang = $request->penumpang;
        $perpanjanganPajak->bpkb = $request->bpkb;
        $perpanjanganPajak->regist_bpkb = $request->regist_bpkb;
        $perpanjanganPajak->import = $request->import;
        $perpanjanganPajak->mesintype = $request->mesintype;
        $perpanjanganPajak->pengambilan = $request->pengambilan; 
        $perpanjanganPajak->metode_pembayaran = $request->metode_pembayaran;
        $perpanjanganPajak->jenis_pelayanan = $request->jenis_pelayanan;
        $perpanjanganPajak->user_id = auth()->user()->id;
        $perpanjanganPajak->save();

        return redirect()->route('perpanjanganPajak2.index')->with('success', 'Perpanjangan Pajak berhasil');
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
