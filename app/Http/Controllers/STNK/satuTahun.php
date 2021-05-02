<?php

namespace App\Http\Controllers\STNK;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\perpanjangan_pajak1;


class satuTahun extends Controller
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
        return view('pengguna.pages.stnk.perpanjanganPajak1', [
            'title' => 'Perpanjangan Pajak',
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
            'no_regis' => ['required', 'unique:perpanjangan_pajak1,no_regis'],
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

        $satuTahun = new perpanjangan_pajak1;
        $satuTahun->no_regis = $request->no_regis;
        $satuTahun->jenis_surat = $request->jenis_surat;
        $satuTahun->jenis_permohonan = $request->jenis_permohonan;
        $satuTahun->status = $request->status;
        $satuTahun->nm_lngkp = $request->nm_lngkp;
        $satuTahun->kebangsaan = $request->kebangsaan;
        $satuTahun->asal = $request->asal;
        $satuTahun->pass = $request->pass;
        $satuTahun->kims = $request->kims;
        $satuTahun->alamat = $request->alamat;
        $satuTahun->hukum = $request->hukum;
        $satuTahun->alamat_hukum = $request->alamat_hukum;
        $satuTahun->akte = $request->akte;
        $satuTahun->kuasa = $request->kuasa;
        $satuTahun->alamat_kuasa = $request->alamat_kuasa;
        $satuTahun->npwp = $request->npwp;
        $satuTahun->ke = $request->ke;
        $satuTahun->fungsi = $request->fungsi;
        $satuTahun->bahan_bakar = $request->bahan_bakar;
        $satuTahun->negara_asal = $request->negara_asal;
        $satuTahun->merk = $request->merk;
        $satuTahun->thn_pembuatan = $request->thn_pembuatan;
        $satuTahun->Silinder = $request->Silinder;
        $satuTahun->no_rangka = $request->no_rangka;
        $satuTahun->no_mesin = $request->no_mesin;
        $satuTahun->mesintype = $request->mesintype;
        $satuTahun->warna = $request->warna;
        $satuTahun->Kemudi = $request->Kemudi;
        $satuTahun->Sumbu = $request->Sumbu;
        $satuTahun->roda = $request->roda;
        $satuTahun->TNKB = $request->TNKB;
        $satuTahun->jml_pintu = $request->jml_pintu;
        $satuTahun->penumpang = $request->penumpang;
        $satuTahun->bpkb = $request->bpkb;
        $satuTahun->regist_bpkb = $request->regist_bpkb;
        $satuTahun->import = $request->import;
        $satuTahun->pengambilan = $request->pengambilan;
        $satuTahun->metode_pembayaran = $request->metode_pembayaran;
        $satuTahun->jenis_pelayanan = $request->jenis_pelayanan;
        $satuTahun->user_id = auth()->user()->id;
        $satuTahun->save();

        return redirect()->route('satutahun.index')->with('success', 'Perpanjangan Pajak berhasil');
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $req)
    {
    }
    /**
     * Show the form for editing the specified resource.
     *
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
