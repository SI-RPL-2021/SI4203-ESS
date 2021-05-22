<?php

namespace App\Http\Controllers\STNK;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\pembuatan_stnk;
use App\Models\User;
use Carbon\Carbon;

class pembuatanSTNK extends Controller
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
            $data = pembuatan_stnk::latest()->get();
        } else {
            $data = pembuatan_stnk::where('user_id', auth()->id())->get();
        }
        return view('pengguna.pages.stnk.pembuatan.index', [
            'title' => 'Pembuatan STNK',
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
        $latest = pembuatan_stnk::orderBy('no_regis', 'desc')->first();
        $latest = pembuatan_stnk::orderBy('no_regis', 'desc')->first();
        if ($latest) {
            $no_regis = $latest->no_regis + 1;
            $nmr_urut = $latest->nmr_urut + 1;
        } else {
            $no_regis = 10000;
            $nmr_urut = 1;
        }
        $users = User::orderBy('username', 'asc')->get();
        return view('pengguna.pages.stnk.pembuatan.create', [
            'title' => 'Pembuatan STNK',
            'no_regis' => $no_regis,
            'users' => $users,
            'nmr_urut' => $nmr_urut
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

        // $request->validate([
        //     'no_regis' => ['required'],
        //     'merk' => ['required'],
        //     'type' => ['required'],
        //     'jenis' => ['required'],
        //     'model' => ['required'],
        //     'thn_pembuatan' => ['required'],
        //     'silinder' => ['required'],
        //     'nmr_rangka' => ['required'],
        //     'nmr_mesin' => ['required'],
        //     'warna_kendaraan' => ['required'],
        //     'bahan_bakar' => ['required'],
        //     'warna_tnkb' => ['required'],
        //     'thn_registrasi' => ['required'],
        //     'nmr_urut' => ['required'],
        //     'nmr_faktur' => ['required'],
        //     'apm' => ['required'],
        //     'nmr_pib' => ['required'],
        //     'nmr_sut' => ['required'],
        //     'nmr_tanda_pendaftaran' => ['required'],
        //     'nama_lengkap_pemilik' => ['required'], 
        //     'alamat_pemilik' => ['required'],
        //     'kode_pos' => ['required'],
        //     'nmr_telepon' => ['required'],
        //     'nmr_ktp' => ['required'],
        //     'kitas' => ['required'],
        //     'baru' => ['nullable'], // checkbox
        //     'perubahan' => ['nullable'],
        //     'persyaratan_khusus' => ['nullable'],
        //     'perpanjangan ' => ['nullable'],
        //     'file' => ['required'],

        // ]);
        $user = User::where('id', request('user_id'))->first();
        $data = request()->all();
        $data['thn_registrasi'] = Carbon::now()->translatedFormat('Y');
        $data['status'] = 1;
        if (auth()->user()->roles->pluck('name')->first() !== 'user') {
            $data['user_id'] = request('user_id');
            $data['nmr_ktp'] = $user->nik;
        } else {
            $data['user_id'] = auth()->id();
            $data['nmr_ktp'] = auth()->user()->nik;
        }
        $data['pajak_berlaku'] = Carbon::now()->addYears(request('pajak_berlaku'));
        $stnk = pembuatan_stnk::create($data);
        if (auth()->user()->roles->pluck('name')->first() !== 'user') {
            $user = User::where('id', request('user_id'))->first();
            $deskripsi = auth()->user()->name . ' membuat SIM atas nama ' . $stnk->nama_pemilik;
            History::create([
                'username' => $user->username,
                'jenis_pelayanan' => 'Pembuatan STNK',
                'no_regis' => request('no_regis'),
                'deskripsi' => $deskripsi,
                'admin' => auth()->user()->username
            ]);
        }

        return redirect()->route('pembuatan-stnk.index')->with('success', 'Laporan Kehilangan STNK Berhasil Dibuat');
    }

    public function status($id)
    {
        $pems = pembuatan_stnk::findOrFail($id);
        $latest = pembuatan_stnk::whereNotNull('no_stnk')->latest()->first();
        $pems->status = request('status');
        if (request('status') == 3) {
            if ($latest) {
                $pems->no_stnk = $latest->no_stnk + 1;
            } else {
                $pems->no_stnk = 100000;
            }
        } else {
            $pems->no_stnk = NULL;
        }
        $pems->save();
        return redirect()->back()->with('success', 'Status berhasil diupdate.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = pembuatan_stnk::findOrFail($id);
        return view('pengguna.pages.stnk.pembuatan.show', [
            'title' => 'Pembuatan STNK',
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
        pembuatan_stnk::destroy($id);

        return redirect()->back()->with('success', 'Permohonan pemnuatan STNK berhasil dihapus.');
    }
}
