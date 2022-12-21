<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transaksi_investasi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('kambing_id')->unsigned()->nullable();
            $table->string('modal');
            $table->date('tgl_investasi')->nullable();
            $table->string('kwitansi_investasi')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('kambing_id')->on('kambing')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi_investasi');
    }
};