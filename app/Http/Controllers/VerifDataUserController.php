<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\laporan_kehilangan_sim;
use App\Models\laporan_kehilangan_stnk;
use App\Models\pembuatan_sim;
use App\Models\Verif_Data_User;
use App\Models\User;

class VerifDataUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items1 = laporan_kehilangan_sim::orderBy('created_at', 'desc')->where('user_id', auth()->id())->get();
        $items2 = laporan_kehilangan_stnk::orderBy('created_at', 'desc')->where('user_id', auth()->id())->get();
        $items3 = pembuatan_sim::orderBy('created_at', 'desc')->where('user_id', auth()->id())->get();
        return view('pengguna.pages.pihakinternal.VerifikasiDataUser', [
            'title' => 'Verifikasi Data User',
            'items1' => $items1,
            'items2' => $items2,
            'items3' => $items3,
        ]);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
       
           
            DB::table('verif_data_user')->where('id',$request->id)->update([
                'status' => $request->status,
            ]);
            
            return redirect('/verif');
        
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
        //
    }
}
