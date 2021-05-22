<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanKehilanganSimTable extends Migration
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
            $table->foreignId('sim_id')->constrained('pembuatan_sim')->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('tanggal_hilang');
            $table->string('keterangan')->nullable();
            $table->string('file');
            $table->integer('status');
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_kehilangan_sim');
    }
}
