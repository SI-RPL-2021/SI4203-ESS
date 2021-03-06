<?php

namespace App\Http\Controllers\SIM;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\pembuatan_sim;
use App\Models\Sim;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Pengaturan;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class pembuatanSIM extends Controller
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
        if (auth()->user()->roles->pluck('name')->first() !== 'user') {
            $data = pembuatan_sim::with('user')->latest()->get();
        } else {
            $data = pembuatan_sim::with('user')->where('user_id', auth()->id())->latest()->get();
        }
        return view('pengguna.pages.sim.pembuatan.index', [
            'title' => 'Pembuatan SIM',
            'data' => $data
        ]);
    }

    public function create()
    {
        if (auth()->user()->roles->pluck('name')->first() !== 'user') {
            $users = User::orderBy('name', 'asc')->get();
        } else {
            $users = User::where('id', auth()->id())->first();
        }
        $sim = pembuatan_sim::orderBy('no_regis', 'desc')->first();
        if ($sim) {
            $no_regis = $sim->no_regis + 1;
        } else {
            $no_regis = 1000;
        }
        return view('pengguna.pages.sim.pembuatan.create', [
            'title' => 'Permohonan Pembuatan SIM',
            'users' => $users,
            'no_regis' => $no_regis
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

        $sim = pembuatan_sim::where('user_id', request('user_id'))->count();
        $golsim = pembuatan_sim::where('user_id', request('user_id'))->where('gol_sim', request('gol_sim'))->first();
        if ($sim >= 3) {
            return redirect()->route('pembuatan-sim.index')->with('gagal', 'Anda gagal membuat permohonan, maksimal setiap user membuat 3 kali permohonan.');
        } elseif ($golsim) {
            return redirect()->route('pembuatan-sim.index')->with('gagal', 'Anda gagal membuat permohonan, permohonan untuk golongan sim yang sama sudah pernah dibuat.');
        }

        $user = User::where('id', request('user_id'))->first();

        $pembuatanSIM = new pembuatan_sim;
        $pembuatanSIM->status = 1;
        $pembuatanSIM->masa_berlaku = Carbon::now();
        $pembuatanSIM->no_regis = $request->no_regis;
        $pembuatanSIM->gol_sim = $request->gol_sim;
        $pembuatanSIM->polda_kedatangan = $request->polda_kedatangan;
        $pembuatanSIM->satpas_kedatangan = $request->satpas_kedatangan;
        $pembuatanSIM->alamat_satpas = $request->alamat_satpas;
        $pembuatanSIM->kwn = $request->kwn;
        $pembuatanSIM->nik = $user->nik;
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
        $pembuatanSIM->user_id = $request->user_id;
        $pembuatanSIM->save();


        // insert ke keranjang

        if ($pembuatanSIM->gol_sim === 'A') {
            $biaya = Pengaturan::first()->biaya_pembuatan_sim_a;
        } elseif ($pembuatanSIM->gol_sim === 'B') {
            $biaya = Pengaturan::first()->biaya_pembuatan_sim_b;
        } elseif ($pembuatanSIM->gol_sim === 'C') {
            $biaya = Pengaturan::first()->biaya_pembuatan_sim_c;
        }
        $data = [
            'jenis_layanan' => 'Pembuatan SIM',
            'keterangan' => 'Pembuatan SIM ' . $pembuatanSIM->gol_sim . ' dengan nama ' . $pembuatanSIM->nm_lngkp,
            'biaya' => $biaya,
            'user_id' => $pembuatanSIM->user_id
        ];
        Keranjang::create($data);

        // insert ke history


        History::create([
            'username' => auth()->user()->username,
            'jenis_pelayanan' => 'Pembuatan SIM',
            'deskripsi' => 'Membuat permohonan pembuatan SIM ' . $pembuatanSIM->gol_sim . ' dengan No. Registrasi ' . $pembuatanSIM->no_regis
        ]);
        return redirect()->route('pembuatan-sim.index')->with('success', 'Pembutan SIM akan segera di proses.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function status($id)
    {
        $pemsim = pembuatan_sim::findOrFail($id);
        $terakhir = pembuatan_sim::whereNotNull('no_sim')->orderBy('no_sim', 'desc')->first();
        $pemsim->status = request('status');
        if (request('status') == 3) {
            if ($terakhir) {
                $pemsim->no_sim = $terakhir->no_sim + 1;
            } else {
                $pemsim->no_sim = 100000;
            }
            $pemsim->masa_berlaku = Carbon::now()->addYears(5);
        } else {
            $pemsim->no_sim = NULL;
            $pemsim->masa_berlaku = $pemsim->created_at;
        }

        $pemsim->save();

        return redirect()->back()->with('success', 'Status berhasil diupdate.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = pembuatan_sim::findOrFail($id);
        return view('pengguna.pages.sim.pembuatan.show', [
            'title' => 'Detail ',
            'data' => $data
        ]);
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
