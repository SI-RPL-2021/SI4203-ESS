<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LaporanKehilanganSim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_kehilangan_sim', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('nama');
            $table->string('ttl');
            $table->string('pekerjaan');
            $table->string('alamat_tinggal');
            $table->string('no_sim');
            $table->string('no_regis');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->string('file');
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
