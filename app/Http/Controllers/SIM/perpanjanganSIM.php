<?php

namespace App\Http\Controllers\SIM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\pembuatan_sim;
use App\Models\perpanjangan_sim;
use Carbon\Carbon;

class perpanjanganSIM extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = perpanjangan_sim::with('sim')->latest()->get();
        return view('pengguna.pages.sim.perpanjangan.index', [
            'title' => 'Perpanjangan SIM',
            'data' => $data
        ]);
    }

    public function create()
    {
        $data = pembuatan_sim::where('status', 3)->latest()->get();
        return view('pengguna.pages.sim.perpanjangan.create', [
            'title' => 'Tambah Data Perpanjangan SIM',
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
            'sim_id' => ['required '],
            'biaya' => ['required']
        ]);

        $sim = pembuatan_sim::where('id', $request->sim_id)->first();
        $per = perpanjangan_sim::create([
            'sim_id' => $request->sim_id,
            'masa_berlaku' => $sim->masa_berlaku->addYears(5),
            'biaya' => $request->biaya,
            'status' => 1
        ]);

        if (auth()->user()->roles->pluck('name') !== 'user') {
            $deskripsi = auth()->user()->name . ' membuat laporan perpanjangan SIM atas nama ' . $per->sim->nm_lngkp . ' Golongan ' . $per->sim->gol_sim . ' dari tanggal ' . $per->sim->masa_berlaku->translatedFormat('d F Y') . ' sampai tanggal ' . $per->masa_berlaku->translatedFormat('d F Y');
            History::create([
                'username' => $sim->user->username,
                'jenis_pelayanan' => 'Perpanjangan SIM',
                'no_regis' => $sim->no_regis,
                'deskripsi' => $deskripsi,
                'admin' => auth()->user()->username
            ]);
        }


        return redirect()->route('perpanjangan-sim.index')->with('success', 'Perpanjangan SIM akan segera di proses');
    }

    public function show($id)
    {
        $data = perpanjangan_sim::with('sim')->findOrFail($id);
        return view('pengguna.pages.sim.perpanjangan.show', [
            'title' => 'Detail',
            'data' => $data
        ]);
    }
    public function status(Request $request, $id)
    {
        $perpanjangansim = perpanjangan_sim::findOrFail($id);
        $perpanjangansim->status = request('status');
        $perpanjangansim->save();
        $sim = pembuatan_sim::findOrFail($perpanjangansim->sim_id);
        if (request('status') == 3) {
            $sim->update([
                'masa_berlaku' => $perpanjangansim->masa_berlaku
            ]);
        } else {
            $sim->update([
                'masa_berlaku' => $sim->masa_berlaku->subYears(5)
            ]);
        }
        return redirect()->back()->with('success', 'Status berhasil diupdate.');
    }

    public function destroy($id)
    {
        perpanjangan_sim::destroy($id);

        return redirect()->back()->with('success', 'Permohonan Perpanjangan SIM berhasil dihapus.');
    }
}
