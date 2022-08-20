<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wesel', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('nama_tim_2')->nullable();
            $table->string('nama_tim_3')->nullable();
            $table->string('nama_tim_4')->nullable();
            $table->string('nama_wesel');
            $table->string('nama_stasiun');
            $table->string('nama_line')->nullable();
            $table->date('tanggal_kerja');
            $table->string('foto_kegiatan_1')->nullable();
            $table->string('foto_kegiatan_2')->nullable();

            // Track Gauge
            $table->string('TG_1');
            $table->string('TG_2');
            $table->string('TG_2A');
            $table->string('TG_2AA');
            $table->string('TG_3');
            $table->string('TG_3A');
            $table->string('TG_4A')->nullable();
            $table->string('TG_5');
            $table->string('TG_5A');
            $table->string('TG_6A')->nullable();
            $table->string('TG_7');
            $table->string('TG_7A');
            $table->string('TG_10');
            $table->string('TG_10A');

            // Cross Level
            $table->string('CL_1');
            $table->string('CL_2');
            $table->string('CL_2A');
            $table->string('CL_2AA');
            $table->string('CL_3');
            $table->string('CL_3A');
            $table->string('CL_4')->nullable();
            $table->string('CL_4A')->nullable();
            $table->string('CL_5');
            $table->string('CL_5A');
            $table->string('CL_7');
            $table->string('CL_7A');
            $table->string('CL_8');
            $table->string('CL_8A');
            $table->string('CL_10');
            $table->string('CL_10A');

            // Alignment
            $table->string('AL_2');
            $table->string('AL_5');
            $table->string('AL_5A_1per2');
            $table->string('AL_5A_1per4');
            $table->string('AL_5A_3per4');
            $table->string('AL_9');

            // Longitudinal Level
            $table->string('LL_2');
            $table->string('LL_5');
            $table->string('LL_5A');
            $table->string('LL_9');

            // Back Gauge
            $table->string('BG_8');
            $table->string('BG_8A');

            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wesel');
    }
};