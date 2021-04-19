<?php

namespace App\Http\Controllers\STNK;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\lima_tahun;


class limaTahun extends Controller
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
            'title' => 'Perpanjangan Pajak 5 tahun',
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
            'jenis' => ['required'],
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
            'jenis_pelayanan' => ['required'],
            'import' => ['required'],
            'no_regis' => ['required', 'unique:perpanjangan_pajak2,no_regis'],
            'pengambilan' => ['required'],
            'metode_pembayaran' => ['required'],
        ]);

        $limaTahun = new perpanjangan_pajak2;
        $limaTahun->jenis_surat = $request->jenis_surat;
        $limaTahun->jenis_permohonan = $request->jenis_permohonan;
        $limaTahun->status = $request->status;
        $limaTahun->nm_lngkp = $request->nm_lngkp;
        $limaTahun->kebangsaan = $request->kebangsaan;
        $limaTahun->asal = $request->asal;
        $limaTahun->pass = $request->pass;
        $limaTahun->kims = $request->kims;
        $limaTahun->alamat = $request->alamat;
        $limaTahun->hukum = $request->hukum;
        $limaTahun->alamat_hukum = $request->alamat_hukum;
        $limaTahun->akte = $request->akte;
        $limaTahun->kuasa = $request->kuasa;
        $limaTahun->alamat_kuasa = $request->alamat_kuasa;
        $limaTahun->npwp = $request->npwp;
        $limaTahun->ke = $request->ke;
        $limaTahun->jenis = $request->jenis;
        $limaTahun->fungsi = $request->fungsi;
        $limaTahun->bahan_bakar = $request->bahan_bakar;
        $limaTahun->negara_asal = $request->negara_asal;
        $limaTahun->merk = $request->merk;
        $limaTahun->thn_pembuatan = $request->thn_pembuatan;
        $limaTahun->Silinder = $request->Silinder;
        $limaTahun->no_rangka = $request->no_rangka;
        $limaTahun->no_mesin = $request->no_mesin;
        $limaTahun->mesintype = $request->mesintype;
        $limaTahun->warna = $request->warna;
        $limaTahun->Kemudi = $request->Kemudi;
        $limaTahun->Sumbu = $request->Sumbu;
        $limaTahun->roda = $request->roda;
        $limaTahun->TNKB = $request->TNKB;
        $limaTahun->jml_pintu = $request->jml_pintu;
        $limaTahun->penumpang = $request->penumpang;
        $limaTahun->bpkb = $request->bpkb;
        $limaTahun->regist_bpkb = $request->regist_bpkb;
        $limaTahun->import = $request->import;
        $limaTahun->no_regis = $request->no_regis;
        $limaTahun->jenis_pelayanan = $request->jenis_pelayanan;
        $limaTahun->pengambilan = $request->pengambilan;
        $limaTahun->metode_pembayaran = $request->metode_pembayaran;
        $limaTahun->user_id = auth()->user()->id;
        $limaTahun->save();

        return redirect()->route('limatahun.index')->with('success', 'Perpanjangan Pajak berhasil');
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
