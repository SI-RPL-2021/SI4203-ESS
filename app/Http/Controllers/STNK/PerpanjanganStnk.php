<?php

namespace App\Http\Controllers\STNK;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\pembuatan_stnk;
use App\Models\perpanjangan_pajak;
use App\Models\PerpanjanganStnk as ModelsPerpanjanganStnk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PerpanjanganStnk extends Controller
{
    public function index()
    {
        $data = ModelsPerpanjanganStnk::with('stnk')->latest()->get();
        return view('pengguna.pages.STNK.perpanjangan.index', [
            'title' => 'Perpanjangan STNK',
            'data' => $data
        ]);
    }

    public function create()
    {
        $data = pembuatan_stnk::where('status', 3)->orderBy('no_stnk')->get();
        return view('pengguna.pages.STNK.perpanjangan.create', [
            'title' => 'Buat Perpanjangan STNK',
            'data' => $data
        ]);
    }

    public function store()
    {
        $data = request()->all();
        $data2 = pembuatan_stnk::where('id', request('stnk_id'))->first();
        if (request('pajak_berlaku') == 1) {
            $data['pajak_berlaku'] = $data2->pajak_berlaku->addYears(request('pajak_berlaku'));
            $data['keterangan'] = '1 Tahun';
        } else {
            $data['pajak_berlaku'] = $data2->pajak_berlaku->addYears(request('pajak_berlaku'));
            $data['keterangan'] = '5 Tahun';
        }
        $data['status'] = 1;
        $per = ModelsPerpanjanganStnk::create($data);
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

        $perpanjanganstnk->status = request('status');
        $perpanjanganstnk->save();
        $stnk = pembuatan_stnk::where('id', $perpanjanganstnk->stnk_id)->first();

        if ($perpanjanganstnk->status == 3) {
            $stnk->update([
                'pajak_berlaku' => $perpanjanganstnk->pajak_berlaku
            ]);
        } else {
            if ($perpanjanganstnk->keterangan === '1 Tahunan') {
                $stnk->update([
                    'pajak_berlaku' => $perpanjanganstnk->pajak_berlaku->subYears(1)
                ]);
            } else {
                $stnk->update([
                    'pajak_berlaku' => $perpanjanganstnk->pajak_berlaku->pajak_berlaku->subYears(5)
                ]);
            }
        }

        return redirect()->back()->with('success', 'Status berhasil diupdate.');
    }

    public function show($id)
    {
        $data = ModelsPerpanjanganStnk::findOrFail($id);
        return view('pengguna.pages.STNK.perpanjangan.show', [
            'title' => 'Detail Perpanjangan STNk',
            'data' => $data
        ]);
    }

    public function destroy($id)
    {
        ModelsPerpanjanganStnk::destroy($id);
        return redirect()->back()->with('success', 'Perpanjangan STNK berhasil dihapus.');
    }
}
