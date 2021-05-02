<?php

namespace App\Http\Controllers\SIM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\laporan_kehilangan_sim;
use App\Models\pembuatan_sim;

class kehilanganSIM extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->level === 'user') {
            $sim = pembuatan_sim::where('user_id', auth()->id())->where('status', 3)->first();
            $data = laporan_kehilangan_sim::where('user_id', auth()->id())->get();
            if ($data->count() < 1) {
                return redirect()->route('kehilangan-sim.create');
            }
        } else {
            $data = laporan_kehilangan_sim::latest()->get();
        }
        return view('pengguna.pages.sim.kehilangan.index', [
            'title' => 'Laporan Kehilangan SIM',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->level === 'user') {
            $sim = pembuatan_sim::where('user_id', auth()->id())->where('status', 3)->first();
            $data = laporan_kehilangan_sim::where('user_id', auth()->id())->first();
            if (!$sim) {
                return redirect()->route('pembuatan-sim.index');
            }
            if ($data !== NULL && $data->count() > 0) {
                return redirect()->route('kehilangan-sim.index');
            }
        } else {
            $sim = NULL;
        }
        return view('pengguna.pages.sim.kehilangan.create', [
            'title' => 'Buat Laporan Kehilangan SIM',
            'sim' => $sim
        ]);
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
            'nama' => ['required'],
            'ttl' => ['required'],
            'pekerjaan' => ['required'],
            'alamat_tinggal' => ['required'],
            'no_sim' => ['required'],
            'no_regis' => ['required', 'unique:laporan_kehilangan_sim,no_regis'],
            'tgl_awal' => ['required'],
            'tgl_akhir' => ['required'],
            'file' => ['required'],
            'jenis_pelayanan' => ['required'],
        ]);



        $laporankehilangan = new laporan_kehilangan_sim;
        $laporankehilangan->no_regis = $request->no_regis;
        $laporankehilangan->nama = $request->nama;
        $laporankehilangan->ttl = $request->ttl;
        $laporankehilangan->pekerjaan = $request->pekerjaan;
        $laporankehilangan->alamat_tinggal = $request->alamat_tinggal;
        $laporankehilangan->no_sim = $request->no_sim;
        $laporankehilangan->no_regis = $request->no_regis;
        $laporankehilangan->tgl_awal = $request->tgl_awal;
        $laporankehilangan->tgl_akhir = $request->tgl_akhir;
        $laporankehilangan->jenis_pelayanan = $request->jenis_pelayanan;
        $laporankehilangan->file = $request->file;
        if (auth()->user()->level === 'admin sim') {
            $laporankehilangan->user_id = NULL;
        } else {
            $laporankehilangan->user_id = auth()->user()->id;
        }
        $laporankehilangan->save();

        return redirect()->route('kehilangan-sim.index')->with('success', 'Laporan Kehilangan SIM Berhasil Dibuat');
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
        laporan_kehilangan_sim::destroy($id);

        return redirect()->back()->with('success', 'Laporan berhasil dihapus.');
    }
}
