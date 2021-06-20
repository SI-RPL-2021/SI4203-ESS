<?php

namespace App\Http\Controllers\SIM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\pembuatan_sim;
use App\Models\Pengaturan;
use App\Models\perpanjangan_sim;
use Carbon\Carbon;

class perpanjanganSIM extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->roles->pluck('name')->first() !== 'user') {
            $data = perpanjangan_sim::with('sim')->latest()->get();
        } else {
            $data = perpanjangan_sim::where('user_id', auth()->id())->with('sim')->latest()->get();
        }

        return view('pengguna.pages.sim.perpanjangan.index', [
            'title' => 'Perpanjangan SIM',
            'data' => $data
        ]);
    }

    public function create()
    {
        if (auth()->user()->roles->pluck('name')->first() !== 'user') {
            $data = pembuatan_sim::where('status', 3)->latest()->get();
        } else {
            $data = pembuatan_sim::where('user_id', auth()->id())->where('status', 3)->latest()->get();
        }

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
            'sim_id' => ['required ']
        ]);
        $sim = pembuatan_sim::where('id', $request->sim_id)->first();
        $biaya = [
            'biaya_perpanjangan_sim_a' => Pengaturan::first()->biaya_perpanjangan_sim_a,
            'biaya_perpanjangan_sim_b' => Pengaturan::first()->biaya_perpanjangan_sim_b,
            'biaya_perpanjangan_sim_c' => Pengaturan::first()->biaya_perpanjangan_sim_c,
        ];
        if ($sim->gol_sim === 'A') {
            $biaya = $biaya['biaya_perpanjangan_sim_a'];
        } elseif ($sim->gol_sim === 'B') {
            $biaya = $biaya['biaya_perpanjangan_sim_b'];
        } elseif ($sim->gol_sim === 'C') {
            $biaya = $biaya['biaya_perpanjangan_sim_c'];
        };
        $per = perpanjangan_sim::create([
            'sim_id' => $request->sim_id,
            'masa_berlaku' => $sim->masa_berlaku->addYears(5),
            'biaya' => $biaya,
            'status' => 1,
            'user_id' => $sim->user_id
        ]);

        History::create([
            'username' => auth()->user()->username,
            'jenis_pelayanan' => 'Perpanjangan SIM',
            'deskripsi' => 'Membuat permohonan perpanjangan SIM ' . $per->sim->gol_sim . ' dengan No. SIM ' . $per->sim->no_sim
        ]);


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
