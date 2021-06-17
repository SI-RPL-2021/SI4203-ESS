<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaturanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaturan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('biaya_pembuatan_sim_a');
            $table->bigInteger('biaya_pembuatan_sim_b');
            $table->bigInteger('biaya_pembuatan_sim_c');
            $table->bigInteger('biaya_perpanjangan_sim_a');
            $table->bigInteger('biaya_perpanjangan_sim_b');
            $table->bigInteger('biaya_perpanjangan_sim_c');
            $table->string('persyaratan_kehilangan_sim')->nullable();
            $table->bigInteger('biaya_pembuatan_stnk_motor');
            $table->bigInteger('biaya_pembuatan_stnk_mobil');
            $table->bigInteger('biaya_perpanjangan_stnk_motor');
            $table->bigInteger('biaya_perpanjangan_stnk_mobil');
            $table->string('persyaratan_kehilangan_stnk')->nullable();
            $table->bigInteger('biaya_pajak_kendaraan_motor');
            $table->bigInteger('biaya_pajak_kendaraan_mobil');
            $table->bigInteger('biaya_perpanjangan_pajak_kendaraan_motor');
            $table->bigInteger('biaya_perpanjangan_pajak_kendaraan_mobil');
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
        Schema::dropIfExists('pengaturan');
    }
}
