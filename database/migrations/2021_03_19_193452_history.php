<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class History extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            // $table->foreignId('laporan_kehilangan_sim_id')->constrained('laporan_kehilangan_sim')->cascadeOnUpdate()->cascadeOnDelete();
            $table->rememberToken();
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
        //
    }
}
