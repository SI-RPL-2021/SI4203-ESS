<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembuatanStnkTable extends Migration
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
            $table->bigInteger('no_regis');
            $table->string('merk');
            $table->string('type');
            $table->string('jenis');
            $table->string('model');
            $table->integer('thn_pembuatan');
            $table->string('silinder');
            $table->bigInteger('nmr_rangka');
            $table->bigInteger('nmr_mesin');
            $table->string('warna_kendaraan');
            $table->string('bahan_bakar');
            $table->string('warna_tnkb');
            $table->integer('thn_registrasi');
            $table->integer('nmr_urut');
            $table->bigInteger('nmr_faktur');
            $table->string('apm');
            $table->bigInteger('nmr_pib');
            $table->bigInteger('nmr_sut');
            $table->bigInteger('nmr_tanda_pendaftaran');
            $table->string('kepemilikan');
            $table->string('nama_pemilik');
            $table->string('alamat_pemilik');
            $table->integer('kode_pos');
            $table->string('nmr_telepon');
            $table->bigInteger('nmr_ktp');
            $table->string('kitas');
            $table->string('baru')->nullable();
            $table->string('perubahan')->nullable();
            $table->string('persyaratan_khusus')->nullable();
            $table->string('perpanjangan')->nullable();
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
        Schema::dropIfExists('pembuatan_stnk');
    }
}
