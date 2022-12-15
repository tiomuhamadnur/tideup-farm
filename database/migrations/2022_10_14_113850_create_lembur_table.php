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
        Schema::create('lembur', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->date('tanggal_mulai');
            $table->time('waktu_mulai');
            $table->date('tanggal_akhir');
            $table->time('waktu_akhir');
            $table->string('waktu_total')->nullable();
            $table->enum('jenis_lembur', ['Hari Kerja', 'Hari Libur Shift', 'Hari Libur Nasional']);
            $table->string('deskripsi');
            $table->string('foto_kegiatan_1')->nullable();
            $table->string('foto_kegiatan_2')->nullable();
            $table->enum('approval', ['DRAFT', 'APPROVED', 'WAITING', 'REJECTED'])->nullable();
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
        Schema::dropIfExists('lembur');
    }
};