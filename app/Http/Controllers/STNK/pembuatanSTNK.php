<?php

namespace App\Http\Controllers\STNK;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $data = pembuatan_stnk::latest()->get();
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
        if ($latest) {
            $no_regis = $latest->no_regis + 1;
        } else {
            $no_regis = 123456789;
        }
        $users = User::orderBy('username', 'asc')->get();
        return view('pengguna.pages.stnk.pembuatan.create', [
            'title' => 'Pembuatan STNK',
            'no_regis' => $no_regis,
            'users' => $users
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
        $data['thn_registrasi'] = Carbon::now()->translatedFormat('Y');
        $data['status'] = 1;
        $data['user_id'] = request('user_id');
        pembuatan_stnk::create($data);

        return redirect()->route('pembuatan-stnk.index')->with('success', 'Laporan Kehilangan STNK Berhasil Dibuat');
    }

    public function status($id)
    {
        $pems = pembuatan_stnk::findOrFail($id);

        $pems->status = request('status');
        $pems->save();
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
