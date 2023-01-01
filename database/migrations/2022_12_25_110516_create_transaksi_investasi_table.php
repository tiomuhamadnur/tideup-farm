<?php

use App\Models\Kelompok;
use App\Models\User;
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
        Schema::create('transaksi_investasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('kelompok_id')->nullable();
            $table->string('modal');
            $table->date('tgl_investasi')->nullable();
            $table->string('kwitansi_investasi')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('kelompok_id')->on('kelompok')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_investasi');
    }
};