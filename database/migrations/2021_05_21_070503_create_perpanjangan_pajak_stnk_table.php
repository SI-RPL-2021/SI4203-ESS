<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerpanjanganPajakStnkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perpanjangan_pajak_stnk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stnk_id')->constrained('pembuatan_stnk')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('pajak_berlaku');
            $table->bigInteger('biaya');
            $table->string('keterangan');
            $table->integer('status');
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
        Schema::dropIfExists('perpanjangan_pajak_stnk');
    }
}
