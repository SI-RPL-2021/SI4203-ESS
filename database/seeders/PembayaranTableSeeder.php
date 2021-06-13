<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use Illuminate\Database\Seeder;

class PembayaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pembayaran::create([
            'nama' => 'Dana',
            'nomor' => '081386129325',
            'keterangan' => 'Naufal'
        ]);
        Pembayaran::create([
            'nama' => 'Link Aja',
            'nomor' => '081386129325',
            'keterangan' => 'Naufal'
        ]);
        Pembayaran::create([
            'nama' => 'Bank Mandiri',
            'nomor' => '123456789',
            'keterangan' => 'Naufal'
        ]);
    }
}
