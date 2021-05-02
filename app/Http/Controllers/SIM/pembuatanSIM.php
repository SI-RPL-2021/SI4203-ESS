<?php

namespace App\Http\Controllers\SIM;

use App\Http\Controllers\Controller;
use App\Models\pembuatan_sim;
use Illuminate\Http\Request;
use App\Models\Sim;

class pembuatanSIM extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'adminsim'])->only('destroy');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->level === 'user') {
            $data = pembuatan_sim::where('user_id', auth()->id())->get();
            if ($data->count() < 1) {
                return redirect()->route('pembuatan-sim.create');
            }
        } elseif (auth()->user()->level === 'admin sim') {
            $data = pembuatan_sim::latest()->get();
        } else {
            return redirect()->route('home');
        }
        return view('pengguna.pages.sim.pembuatan.index', [
            'title' => 'Pembuatan SIM',
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
            'no_regis' => ['required', 'unique:pembuatan_sim,no_regis'],
            'gol_sim' => ['required'],
            'polda_kedatangan' => ['required'],
            'satpas_kedatangan' => ['required'],
            'alamat_satpas' => ['required'],
            'kwn' => ['required'],
            'nik' => ['required'],
            'nm_lngkp' => ['required'],
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
            'jenis_pelayanan' => ['required'],
        ]);

        $pembuatanSIM = new pembuatan_sim;
        if (auth()->user()->level === 'admin sim') {
            $pembuatanSIM->status = $request->status;
        } else {
            $pembuatanSIM->status = 1;
        }
        $pembuatanSIM->no_regis = $request->no_regis;
        $pembuatanSIM->gol_sim = $request->gol_sim;
        $pembuatanSIM->polda_kedatangan = $request->polda_kedatangan;
        $pembuatanSIM->satpas_kedatangan = $request->satpas_kedatangan;
        $pembuatanSIM->alamat_satpas = $request->alamat_satpas;
        $pembuatanSIM->kwn = $request->kwn;
        $pembuatanSIM->nik = $request->nik;
        $pembuatanSIM->nm_lngkp = $request->nm_lngkp;
        $pembuatanSIM->tinggi = $request->tinggi;
        $pembuatanSIM->gol_darah = $request->gol_darah;
        $pembuatanSIM->kd_pos = $request->kd_pos;
        $pembuatanSIM->kota = $request->kota;
        $pembuatanSIM->alamat = $request->alamat;
        $pembuatanSIM->no_hp = $request->no_hp;
        $pembuatanSIM->pendidikan = $request->pendidikan;
        $pembuatanSIM->pekerjaan = $request->pekerjaan;
        $pembuatanSIM->hubungan = $request->hubungan;
        $pembuatanSIM->nama_KD = $request->nama_KD;
        $pembuatanSIM->alamat_KD = $request->alamat_KD;
        $pembuatanSIM->telepon_KD = $request->telepon_KD;
        $pembuatanSIM->nama_ibu_KD = $request->nama_ibu_KD;
        $pembuatanSIM->sertif = $request->sertif;
        $pembuatanSIM->jenis_pelayanan = $request->jenis_pelayanan;
        if (auth()->user()->level === 'admin sim') {
            $pembuatanSIM->user_id = NULL;
        } else {
            $pembuatanSIM->user_id = auth()->user()->id;
        }
        $pembuatanSIM->save();

        return redirect()->route('pembuatan-sim.index')->with('success', 'Pembutan SIM akan segera di proses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        if (auth()->user()->level === 'user') {
            $data = pembuatan_sim::where('user_id', auth()->id())->count();
            if ($data > 0) {
                return redirect()->route('pembuatan-sim.index');
            } else {
                return view('pengguna.pages.sim.pembuatan.create', [
                    'title' => 'Permohonan Pembuatan SIM'
                ]);
            }
        } elseif (auth()->user()->level === 'admin sim') {
            return view('pengguna.pages.sim.pembuatan.create', [
                'title' => 'Permohonan Pembuatan SIM'
            ]);
        }
    }

    public function status($id)
    {
        $pembuatan_sim = pembuatan_sim::findOrFail($id);
        $pembuatan_sim->status = request('status');
        $pembuatan_sim->save();

        return redirect()->back()->with('success', 'Status berhasil diupdate.');
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
        pembuatan_sim::destroy($id);

        return redirect()->back()->with('success', 'Permohonan berhasil dihapus.');
    }
}
