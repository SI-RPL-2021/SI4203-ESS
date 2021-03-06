<?php

namespace App\Http\Controllers\SIM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\laporan_kehilangan_sim;
use App\Models\pembuatan_sim;
use App\Models\Pengaturan;
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
        if (auth()->user()->roles->pluck('name')->first() !== 'user') {
            $data = laporan_kehilangan_sim::with('sim')->latest()->get();
        } else {
            $data = laporan_kehilangan_sim::where('user_id', auth()->id())->with('sim')->latest()->get();
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
        if (auth()->user()->roles->pluck('name')->first() !== 'user') {
            $data = pembuatan_sim::where('status', 3)->latest()->get();
        } else {
            $data = pembuatan_sim::where('user_id', auth()->id())->where('status', 3)->latest()->get();
        }
        $pengaturan = [
            'persyaratan' => Pengaturan::first()->persyaratan_kehilangan_sim
        ];
        return view('pengguna.pages.sim.kehilangan.create', [
            'title' => 'Buat Laporan Kehilangan SIM',
            'data' => $data,
            'pengaturan' => $pengaturan
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

        History::create([
            'username' => auth()->user()->username,
            'jenis_pelayanan' => 'Kehilangan SIM',
            'deskripsi' => 'Membuat permohonan kehilangan SIM ' . $sim->sim->gol_sim . ' dengan No. SIM ' . $sim->sim->no_sim
        ]);

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

    public function status(Request $request, $id)
    {
        $kehilangan_sim = laporan_kehilangan_sim::findOrFail($id);

        $kehilangan_sim->status = $request->status;
        $kehilangan_sim->save();

        return redirect()->back()->with('success', 'Status berhasil diupdate.');
    }

    public function download($id)
    {
        $item = laporan_kehilangan_sim::findOrFail($id);
        $filePath = public_path('storage/') . $item->file;
        $headers = ['Content-Type: application/pdf'];
        $fileName = 'persyaratan-kehilangan-sim' . '-' . $item->sim->no_sim . '.pdf';

        if (!file_exists($filePath)) {
            return redirect()->back()->with('gagal', 'File tidak ditemukan.');
        }
        return response()->download($filePath, $fileName, $headers);
    }

    public function destroy($id)
    {
        laporan_kehilangan_sim::destroy($id);

        return redirect()->back()->with('success', 'Laporan berhasil dihapus.');
    }
}
