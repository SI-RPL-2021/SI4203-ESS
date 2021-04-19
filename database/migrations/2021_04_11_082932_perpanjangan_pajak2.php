<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PerpanjanganPajak2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perpanjangan_pajak2', function (Blueprint $table) {
            $table->id();
            $table->integer('no_regis');
            $table->string('jenis_surat');
            $table->string('jenis_permohonan');
            $table->string('status');
            $table->string('nm_lngkp');
            $table->string('kebangsaan');
            $table->string('asal');
            $table->string('pass');
            $table->string('kims');
            $table->string('alamat');
            $table->string('hukum');
            $table->string('alamat_hukum');
            $table->string('akte');
            $table->string('kuasa');
            $table->string('alamat_kuasa');
            $table->string('npwp');
            $table->string('ke');
            $table->string('fungsi');
            $table->string('jenis');
            $table->string('bahan_bakar');
            $table->string('negara_asal');
            $table->string('merk');
            $table->string('thn_pembuatan');
            $table->string('Silinder');
            $table->string('no_rangka');
            $table->string('no_mesin');
            $table->string('mesintype');
            $table->string('warna');
            $table->string('Kemudi');
            $table->string('Sumbu');
            $table->string('roda');
            $table->string('TNKB');
            $table->string('jml_pintu');
            $table->string('penumpang');
            $table->string('bpkb');
            $table->string('regist_bpkb');
            $table->string('import');
            $table->string('pengambilan');
            $table->string('metode_pembayaran');
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
