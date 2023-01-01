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
        Schema::create('kambing', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('kelompok_id')->nullable();
            
            $table->string('name')->nullable();
            $table->string('qr_code')->unique()->nullable();
            $table->string('uid')->unique()->nullable();
            $table->date('tgl_beli')->nullable();
            $table->string('bobot_beli')->nullable();
            $table->string('harga_beli')->nullable();
            $table->string('foto_beli')->nullable();
            $table->string('kwitansi_beli')->nullable();
            $table->date('tgl_jual')->nullable();
            $table->string('bobot_jual')->nullable();
            $table->string('harga_jual')->nullable();
            $table->string('foto_jual')->nullable();
            $table->string('kwitansi_jual')->nullable();
            $table->enum('status', ['ongoing', 'sold'])->nullable();
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
        Schema::dropIfExists('kambing');
    }
};