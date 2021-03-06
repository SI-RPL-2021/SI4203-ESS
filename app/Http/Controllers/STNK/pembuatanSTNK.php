<?php

namespace App\Http\Controllers\STNK;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\pembuatan_stnk;
use App\Models\User;
use App\Models\Pengaturan;
use App\Models\Keranjang;
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
            $data = pembuatan_stnk::where('user_id', auth()->id())->latest()->get();
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
        $data['thn_pembuatan'] = Carbon::now()->translatedFormat('Y');
        $data['status'] = 'MENUNGGU DIPROSES';
        $data['masa_berlaku'] = NULL;
        $data['pajak_berlaku'] = NULL;
        $data['file'] = request()->file('file')->store('pembuatan-sim/pdf', 'public');
        if (auth()->user()->roles->pluck('name')->first() !== 'user') {
            $data['user_id'] = request('user_id');
            $data['nmr_ktp'] = $user->nik;
        } else {
            $data['user_id'] = auth()->id();
            $data['nmr_ktp'] = auth()->user()->nik;
        }
        $stnk = pembuatan_stnk::create($data);

        // insert ke keranjang
        if ($stnk->jenis !== 'Sepeda Motor') {
            $biaya = Pengaturan::first()->biaya_pembuatan_stnk_motor;
        } else {
            $biaya = Pengaturan::first()->biaya_pembuatan_stnk_mobil;
        }
        $data = [
            'jenis_layanan' => 'Pembuatan STNK',
            'keterangan' => 'Pembuatan STNK ' . $stnk->jenis . ' atas nama ' . $stnk->nama_pemilik,
            'biaya' => $biaya,
            'user_id' => $stnk->user_id
        ];
        Keranjang::create($data);

        // insert ke history

        History::create([
            'username' => auth()->user()->username,
            'jenis_pelayanan' => 'Pembuatan STNK',
            'deskripsi' => 'Membuat permohonan pembuatan STNK dengan No. Registrasi ' . $stnk->no_regis
        ]);

        return redirect()->route('pembuatan-stnk.index')->with('success', 'Permohonan pembuatan STNK berhasil dibuat');
    }

    public function status($id)
    {
        $pems = pembuatan_stnk::findOrFail($id);
        $latest = pembuatan_stnk::whereNotNull('no_stnk')->orderBy('no_stnk', 'DESC')->first();
        $pems->status = request('status');
        if (request('status') == 'SUKSES') {
            if ($latest) {
                $pems->no_stnk = $latest->no_stnk + 1;
            } else {
                $pems->no_stnk = 100000;
            }
            $pems->masa_berlaku = Carbon::now()->addYears(5);
            $pems->pajak_berlaku = Carbon::now()->addYears(1);
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


    public function download($id)
    {
        $item = pembuatan_stnk::findOrFail($id);
        $filePath = public_path('storage/') . $item->file;
        $headers = ['Content-Type: application/pdf'];
        $fileName = 'pembuaatan-sim' . $item->nm_pemilik . $item->no_sim . '.pdf';

        if (!file_exists($filePath)) {
            return redirect()->back()->with('gagal', 'File tidak ditemukan.');
        }
        return response()->download($filePath, $fileName, $headers);
    }
}
