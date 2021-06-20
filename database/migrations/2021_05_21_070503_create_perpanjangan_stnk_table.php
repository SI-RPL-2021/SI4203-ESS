<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerpanjanganStnkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perpanjangan_stnk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stnk_id')->constrained('pembuatan_stnk')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('masa_berlaku_sebelumnya')->nullable();
            $table->date('perpanjang_sampai')->nullable();
            $table->bigInteger('biaya');
            $table->string('keterangan');
            $table->string('status');
            $table->foreignId('user_id')->constrained('users')->cascadeOndUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('perpanjangan_stnk');
    }
}
