<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    public function index()
    {
        $item = Pengaturan::latest()->first();
        return view('pengguna.pages.pengaturan.index', [
            'Pengaturan',
            'item' => $item
        ]);
    }

    public function store()
    {
        request()->validate([
            'biaya_pembuatan_sim_a' => ['required'],
            'biaya_pembuatan_sim_b' => ['required'],
            'biaya_pembuatan_sim_c' => ['required'],
            'biaya_perpanjangan_sim_a' => ['required'],
            'biaya_perpanjangan_sim_b' => ['required'],
            'biaya_perpanjangan_sim_c' => ['required'],
            'biaya_pembuatan_stnk_motor' => ['required'],
            'biaya_pembuatan_stnk_mobil' => ['required'],
            'biaya_perpanjangan_stnk_motor' => ['required'],
            'biaya_perpanjangan_stnk_mobil' => ['required'],
            'biaya_pajak_kendaraan_motor' => ['required'],
            'biaya_pajak_kendaraan_mobil' => ['required'],
            'biaya_perpanjangan_pajak_kendaraan_motor' => ['required'],
            'biaya_perpanjangan_pajak_kendaraan_mobil' => ['required'],
        ]);

        $data = request()->all();

        $item = Pengaturan::first();
        if (request('persyaratan_kehilangan_sim')) {
            if ($item) {
                Storage::disk('public')->delete($item->persyaratan_kehilangan_sim);
            }
            $data['persyaratan_kehilangan_sim'] = request()->file('persyaratan_kehilangan_sim')->store('pengaturan', 'public');
        } else {
            if ($item) {
                $data['persyaratan_kehilangan_sim'] = $item->persyaratan_kehilangan_sim;
            }
        }
        if (request('persyaratan_kehilangan_stnk')) {
            if ($item) {
                Storage::disk('public')->delete($item->persyaratan_kehilangan_stnk);
            }
            $data['persyaratan_kehilangan_stnk'] = request()->file('persyaratan_kehilangan_stnk')->store('pengaturan', 'public');
        } else {
            if ($item) {
                $data['persyaratan_kehilangan_stnk'] = $item->persyaratan_kehilangan_stnk;
            }
        }
        if ($item) {
            $item->update($data);
        } else {
            Pengaturan::create($data);
        }

        return redirect()->route('pengaturan.index')->with('success', 'Pengaturan berhasil diupdate.');
    }

    public function download_persyaratan_kehilangan_sim()
    {
        $item = Pengaturan::first();
        $filePath = public_path('storage/') . $item->persyaratan_kehilangan_sim;
        $headers = ['Content-Type: application/pdf'];
        $fileName = 'persyaratan-kehilangan-sim' . '.pdf';

        if (!file_exists($filePath)) {
            return redirect()->back()->with('gagal', 'File tidak ditemukan.');
        }
        return response()->download($filePath, $fileName, $headers);
    }

    public function download_persyaratan_kehilangan_stnk()
    {
        $item = Pengaturan::first()->persyaratan_kehilangan_stnk;
        $filePath = public_path('storage/') . $item;
        $headers = ['Content-Type: application/pdf'];
        $fileName = 'persyaratan-kehilangan-stnk' . '.pdf';

        if (!file_exists($filePath) || $item === NULL) {
            return redirect()->back()->with('gagal', 'File tidak ditemukan.');
        }
        return response()->download($filePath, $fileName, $headers);
    }
}
