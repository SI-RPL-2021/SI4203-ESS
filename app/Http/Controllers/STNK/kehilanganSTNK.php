<?php

namespace App\Http\Controllers\STNK;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\laporan_kehilangan_stnk;
use App\Models\pembuatan_stnk;
use App\Models\Pengaturan;

class kehilanganSTNK extends Controller
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
            $data = laporan_kehilangan_stnk::with('stnk')->latest()->get();
        } else {
            $data = laporan_kehilangan_stnk::with('stnk')->where('user_id', auth()->id())->get();
        }
        return view('pengguna.pages.stnk.kehilangan.index', [
            'title' => 'Laporan Kehilangan STNK',
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
            $data = pembuatan_stnk::where('status', 'SUKSES')->latest()->get();
        } else {
            $data = pembuatan_stnk::where('status', 'SUKSES')->where('user_id', auth()->id())->get();
        }
        $pengaturan = [
            'persyaratan' => Pengaturan::first()->persyaratan_kehilangan_stnk
        ];
        return view('pengguna.pages.stnk.kehilangan.create', [
            'title' => 'Laporan Kehilangan STNK',
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
        $data = request()->all();
        $stnk = pembuatan_stnk::with('user')->where('status', 'SUKSES')->where('id', $request->stnk_id)->first();
        $data['status'] = 'MENUNGGU DIPROSES';
        $data['file'] = request()->file('file')->store('kehilangan-stnk.pdf', 'public');
        if (auth()->user()->roles->pluck('name')->first() !== 'user') {
            $data['user_id'] = $stnk->user->id;
        } else {
            $data['user_id'] = auth()->id();
        }
        $stnk = laporan_kehilangan_stnk::create($data);
        History::create([
            'username' => auth()->user()->username,
            'jenis_pelayanan' => 'Kehilangan STNK',
            'deskripsi' => 'Membuat permohonan kehilangan STNK dengan No. STNK ' . $stnk->stnk->no_stnk
        ]);
        return redirect()->route('kehilangan-stnk.index')->with('success', 'Laporan Kehilangan STNK Berhasil Dibuat');
    }

    public function status(Request $request, $id)
    {
        $kehilangan_stnk = laporan_kehilangan_stnk::findOrFail($id);

        $kehilangan_stnk->status = $request->status;
        $kehilangan_stnk->save();

        return redirect()->back()->with('success', 'Status berhasil diupdate.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = laporan_kehilangan_stnk::findOrFail($id);
        return view('pengguna.pages.stnk.kehilangan.show', [
            'title' => 'Detail kehilangan stnk',
            'data' => $data
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = laporan_kehilangan_stnk::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Laporan kehilangan berhasil dihapus.');
    }

    public function download($id)
    {
        $item = laporan_kehilangan_stnk::findOrFail($id);
        $filePath = public_path('storage/') . $item->file;
        $headers = ['Content-Type: application/pdf'];
        $fileName = 'persyaratan-kehilangan-stnk' . '-' . $item->stnk->no_stnk . '.pdf';

        if (!file_exists($filePath)) {
            return redirect()->back()->with('gagal', 'File tidak ditemukan.');
        }
        return response()->download($filePath, $fileName, $headers);
    }
}
