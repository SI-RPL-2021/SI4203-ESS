<?php

namespace App\Http\Controllers\SIM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\laporan_kehilangan_sim;
use App\Models\pembuatan_sim;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Http\Response as HttpResponse;
use Response;

class kehilanganSIM extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth','adminsim']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = laporan_kehilangan_sim::with('sim')->latest()->get();
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
        $data = pembuatan_sim::where('status', 3)->latest()->get();
        return view('pengguna.pages.sim.kehilangan.create', [
            'title' => 'Buat Laporan Kehilangan SIM',
            'data' => $data
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
            'sim_id' => ['required'],
            'tanggal_hilang' => ['required'],
            'keterangan' => ['required'],
            'file' => ['required']
        ]);
        $user = pembuatan_sim::with('user')->where('status', '3')->where('id', $request->sim_id)->first();
        $file = request()->file('file')->store('persyaratan', 'public');
        $sim = laporan_kehilangan_sim::create([
            'sim_id' => $request->sim_id,
            'tanggal_hilang' => $request->tanggal_hilang,
            'keterangan' => $request->keterangan,
            'file' => $file,
            'status' => 1,
            'user_id' => $user->user->id
        ]);

        if (auth()->user()->roles->pluck('name') !== 'user') {
            $deskripsi = auth()->user()->name . ' membuat laporan kehilangan SIM atas nama ' . request('nm_lngkp') . ' Golongan SIM ' . $sim->sim->gol_sim;
            History::create([
                'username' => $user->user->username,
                'jenis_pelayanan' => 'Kehilangan SIM',
                'no_regis' => $sim->sim->no_regis,
                'deskripsi' => $deskripsi,
                'admin' => auth()->user()->username
            ]);
        }

        return redirect()->route('kehilangan-sim.index')->with('success', 'Laporan Kehilangan SIM Berhasil Dibuat');
    }

    public function show($id)
    {
        $data = laporan_kehilangan_sim::with('sim')->findOrFail($id);
        return view('pengguna.pages.sim.kehilangan.show', [
            'title' => 'Detail',
            'data' => $data
        ]);
    }

    function download($id)
    {
        $keh = laporan_kehilangan_sim::findOrFail($id);
        $path = storage_path($keh->file);
        // return Response::download($keh->file, "Surat Keterangan Hilang.pdf", ['Content-Type: application/pdf']);
        return response()->download($path, $keh, ['Content-Type: application/pdf']);
    }

    public function status(Request $request, $id)
    {
        $kehilangan_sim = laporan_kehilangan_sim::findOrFail($id);

        $kehilangan_sim->status = $request->status;
        $kehilangan_sim->save();

        return redirect()->back()->with('success', 'Status berhasil diupdate.');
    }


    public function destroy($id)
    {
        laporan_kehilangan_sim::destroy($id);

        return redirect()->back()->with('success', 'Laporan berhasil dihapus.');
    }
}
