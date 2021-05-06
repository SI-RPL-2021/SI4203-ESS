<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PembuatanSTNK extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembuatan_stnk', function (Blueprint $table) {
            $table->id();
            $table->string('no_regis');
            $table->string('merk');
            $table->string('type');
            $table->string('jenis');
            $table->string('model');
            $table->string('thn_pembuatan');
            $table->string('silinder');
            $table->string('nmr_rangka');
            $table->string('nmr_mesin');
            $table->string('warna_kendaraan');
            $table->string('bahan_bakar');
            $table->string('warna_tnkb');
            $table->string('thn_registrasi');
            $table->string('nmr_urut');
            $table->string('nmr_faktur');
            $table->date('tgl');
            $table->string('apm');
            $table->string('nmr_pib');
            $table->string('nmr_sut');
            $table->string('nmr_tanda_pendaftaran');
            $table->string('nama_lengkap_pemilik');
            $table->string('alamat_pemilik');
            $table->string('kode_pos');
            $table->string('nmr_telepon');
            $table->string('nmr_ktp');
            $table->string('kitas');
            $table->string('baru');
            $table->string('perubahan');
            $table->string('persyaratan_khusus');
            $table->string('perpanjangan');
            $table->string('file');
            $table->rememberToken();
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
