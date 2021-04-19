<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PembuatanSim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembuatan_sim', function (Blueprint $table) {
            $table->id();
            $table->integer('no_regis');
            $table->string('gol_sim');
            $table->string('polda_kedatangan');
            $table->string('satpas_kedatangan');
            $table->string('alamat_satpas');
            $table->string('kwn');
            $table->string('nik');
            $table->string('nm_lngkp');
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
            $table->string('jenis_pelayanan');
            $table->rememberToken();
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
        });
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
