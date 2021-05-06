<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PerpanjanganSim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perpanjangan_sim', function (Blueprint $table) {
            $table->id();
            $table->string('gol_sim');
            $table->string('no_sim');
            $table->string('masa_berlaku_sim');
            $table->string('satpas_penerbit');
            $table->string('alamat_email');
            $table->string('polda_kedatangan');
            $table->string('satpas_kedatangan');
            $table->string('alamat_satpas_kedatangan');
            $table->string('kwn');
            $table->string('nik');
            $table->string('nama_lengkap');
            $table->string('tinggi');
            $table->string('gol_darah');
            $table->string('kd_pos');
            $table->string('kota');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('hubungan');
            $table->string('nama_KD');
            $table->string('alamat_KD');
            $table->string('telepon_KD');
            $table->string('nama_ibu_KD');
            $table->string('sertif');
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
