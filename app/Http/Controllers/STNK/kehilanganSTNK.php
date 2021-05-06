<?php

namespace App\Http\Controllers\STNK;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\laporan_kehilangan_stnk;
use App\Models\pembuatan_stnk;

class kehilanganSTNK extends Controller
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
        $data = laporan_kehilangan_stnk::with('stnk')->latest()->get();
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
        $data = pembuatan_stnk::where('status', 3)->latest()->get();
        return view('pengguna.pages.stnk.kehilangan.create', [
            'title' => 'Laporan Kehilangan STNK',
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

        $data = request()->all();
        $user = pembuatan_stnk::with('user')->where('status', 3)->where('id', $request->stnk_id)->first();
        $data['status'] = 1;
        $data['user_id'] = $user->id;
        laporan_kehilangan_stnk::create($data);
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
    public function destroy()
    {
    }
}
