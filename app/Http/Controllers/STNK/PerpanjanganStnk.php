<?php

namespace App\Http\Controllers\STNK;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\pembuatan_stnk;
use App\Models\perpanjangan_pajak;
use App\Models\PerpanjanganStnk as ModelsPerpanjanganStnk;
use App\Models\Pengaturan;
use App\Models\Keranjang;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PerpanjanganStnk extends Controller
{
    public function index()
    {
        if (auth()->user()->roles->pluck('name')->first() !== 'user') {
            $data = ModelsPerpanjanganStnk::with('stnk')->latest()->get();
        } else {
            $data = ModelsPerpanjanganStnk::with('stnk')->where('user_id', auth()->id())->latest()->get();
        }
        return view('pengguna.pages.stnk.perpanjangan.index', [
            'title' => 'Perpanjangan STNK',
            'data' => $data
        ]);
    }

    public function create()
    {
        if (auth()->user()->roles->pluck('name')->first() !== 'user') {
            $data = pembuatan_stnk::where('status', 'SUKSES')->orderBy('no_stnk')->get();
        } else {
            $data = pembuatan_stnk::where('status', 'SUKSES')->orderBy('no_stnk')->where('user_id', auth()->id())->get();
        }
        $pengaturan = [
            'motor' => Pengaturan::first()->biaya_perpanjangan_stnk_motor,
            'mobil' => Pengaturan::first()->biaya_perpanjangan_stnk_mobil
        ];
        return view('pengguna.pages.stnk.perpanjangan.create', [
            'title' => 'Buat Perpanjangan STNK',
            'data' => $data,
            'pengaturan' => $pengaturan
        ]);
    }

    public function store()
    {
        request()->validate([
            'stnk_id' => ['required']
        ]);
        $data = request()->all();
        $stnk = pembuatan_stnk::where('id', request('stnk_id'))->first();
        if ($stnk->jenis !== 'Sepeda Motor') {
            $biaya = Pengaturan::first()->biaya_perpanjangan_stnk_motor;
        } else {
            $biaya = Pengaturan::first()->biaya_perpanjangan_stnk_mobil;
        }
        $data['user_id'] = $stnk->user_id;
        $data['biaya'] = $biaya;
        $data['status'] = 'PROSES';
        $data['masa_berlaku_sebelumnya'] = $stnk->masa_berlaku;
        $data['perpanjang_sampai'] = $stnk->masa_berlaku->addYears(5);
        $per = ModelsPerpanjanganStnk::create($data);


        // insert ke keranjang
        if ($stnk->jenis !== 'Sepeda Motor') {
            $biaya = Pengaturan::first()->biaya_perpanjangan_stnk_motor;
        } else {
            $biaya = Pengaturan::first()->biaya_perpanjangan_stnk_mobil;
        }
        $data = [
            'jenis_layanan' => 'Perpanjangan STNK',
            'keterangan' => 'Perpanjangan STNK ' . $stnk->jenis . ' atas nama ' . $stnk->nama_pemilik,
            'biaya' => $biaya,
            'user_id' => $stnk->user_id
        ];
        Keranjang::create($data);

        // insert ke history

        if (auth()->user()->roles->pluck('name') !== 'user') {
            $deskripsi = auth()->user()->name . ' membuat laporan perpanjangan STNK atas nama ' . $per->stnk->nama_pemilik . ' dari tanggal ' . $per->stnk->pajak_berlaku->translatedFormat('d F Y') . ' sampai tanggal ' . $per->pajak_berlaku->translatedFormat('d F Y');
            History::create([
                'username' => $per->stnk->user->username,
                'jenis_pelayanan' => 'Perpanjangan SIM',
                'no_regis' => $per->stnk->no_regis,
                'deskripsi' => $deskripsi,
                'admin' => auth()->user()->username
            ]);
        }

        return redirect()->route('perpanjangan-stnk.index')->with('success', 'Perpanjangan STNK berhasil dilakukan, silahkan tunggu admin menyelesaikannya.');
    }

    public function status($id)
    {
        $perpanjanganstnk = ModelsPerpanjanganStnk::findOrFail($id);
        $perpan = ModelsPerpanjanganStnk::where('stnk_id', $perpanjanganstnk->stnk->id);
        $stnk_terakhir = $perpan->latest()->first();
        $stnk = pembuatan_stnk::where('id', $perpanjanganstnk->stnk_id)->first();
        $perpanjanganstnk->status = request('status');

        // cek apakah data yang diedit itu tidak sama tidak dengan data stnk terakhir (berdasarkan user_id)
        if ($stnk_terakhir->id !== $perpanjanganstnk->id) {
            // jika tidak sama
            return redirect()->route('perpanjangan-stnk.index')->with('gagal', 'Status gagal diupdate, dikarenakan bukan data terakhir.');
        }

        // cek apakah statusnya akan dirubah menjadi sukses/berhasil
        if (request('status') === 'SUKSES') {
            // edit perpanjangan nya
            $perpanjanganstnk->masa_berlaku_sebelumnya = $stnk->masa_berlaku;
            $perpanjanganstnk->perpanjang_sampai = $stnk->masa_berlaku->addYears(5);

            // update data dari pembuatan stnk
            $stnk->update(['masa_berlaku' => $perpanjanganstnk->perpanjang_sampai]);
        } else {
            // jika statusnya tidak sama dengan SUKSES, maka
            $stnk->update(['masa_berlaku' => $stnk_terakhir->masa_berlaku_sebelumnya]);
        }
        $perpanjanganstnk->save();
        return redirect()->back()->with('success', 'STNK berhasil diperpanjang.');
    }

    public function show($id)
    {
        $data = ModelsPerpanjanganStnk::findOrFail($id);
        return view('pengguna.pages.stnk.perpanjangan.show', [
            'title' => 'Detail Perpanjangan STNK',
            'data' => $data
        ]);
    }

    public function destroy($id)
    {
        ModelsPerpanjanganStnk::destroy($id);
        return redirect()->back()->with('success', 'Perpanjangan STNK berhasil dihapus.');
    }
}
