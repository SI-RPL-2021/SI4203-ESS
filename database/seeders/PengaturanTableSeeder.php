<?php

namespace Database\Seeders;

use App\Models\Pengaturan;
use Illuminate\Database\Seeder;

class PengaturanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengaturan::create([
            'biaya_pembuatan_sim_a' => 400000,
            'biaya_pembuatan_sim_b' => 200000,
            'biaya_pembuatan_sim_c' => 100000,
            'biaya_perpanjangan_sim_a' => 300000,
            'biaya_perpanjangan_sim_b' => 150000,
            'biaya_perpanjangan_sim_c' => 80000,
            'persyaratan_kehilangan_sim' => NULL,
            'biaya_pembuatan_stnk_motor' => 500000,
            'biaya_pembuatan_stnk_mobil' => 1000000,
            'biaya_perpanjangan_stnk_motor' => 400000,
            'biaya_perpanjangan_stnk_mobil' => 500000,
            'persyaratan_kehilangan_stnk' => NULL,
            'biaya_pajak_kendaraan_motor' => 300000,
            'biaya_pajak_kendaraan_mobil' => 400000,
            'biaya_perpanjangan_pajak_kendaraan_motor' => 200000,
            'biaya_perpanjangan_pajak_kendaraan_mobil' => 300000,
        ]);
    }
}
