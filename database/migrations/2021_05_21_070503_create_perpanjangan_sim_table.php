<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerpanjanganSimTable extends Migration
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
            $table->foreignId('sim_id')->constrained('pembuatan_sim')->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('masa_berlaku');
            $table->bigInteger('biaya');
            $table->integer('status');
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
        Schema::dropIfExists('perpanjangan_sim');
    }
}
