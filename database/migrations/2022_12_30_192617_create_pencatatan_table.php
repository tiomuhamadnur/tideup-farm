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
        Schema::create('pencatatan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('kambing_id')->unsigned();
            $table->string('bobot');
            $table->date('tgl_catat')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('kambing_id')->on('kambing')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pencatatan');
    }
};