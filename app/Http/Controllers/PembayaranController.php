<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Pembayaran::orderBy('nama', 'ASC')->get();
        return view('pengguna.pages.pembayaran.index', [
            'title' => 'Metode Pembayaran',
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.pages.pembayaran.create', [
            'title' => 'Tambah Metode Pembayaran'
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
        request()->validate([
            'nama' => ['required'],
            'nomor' => ['required'],
            'keterangan' => ['required']
        ]);

        Pembayaran::create([
            'nama' => request('nama'),
            'nomor' => request('nomor'),
            'keterangan' => request('keterangan')
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Metode Pembayaran berhasil ditambahkan.');
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
        $item = Pembayaran::findOrFail($id);
        return view('pengguna.pages.pembayaran.edit', [
            'title' => 'Edit Metode Pembayaran',
            'item' => $item
        ]);
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
        request()->validate([
            'nama' => ['required'],
            'nomor' => ['required'],
            'keterangan' => ['required']
        ]);

        $item = Pembayaran::findOrFail($id);

        $item->update([
            'nama' => request('nama'),
            'nomor' => request('nomor'),
            'keterangan' => request('keterangan')
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Metode Pembayaran berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Pembayaran::findOrFail($id);
        $item->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Metode Pembayaran berhasil dihapus.');
    }
}
