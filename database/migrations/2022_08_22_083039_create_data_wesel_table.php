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
        Schema::create('data_wesel', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wesel');
            // $table->bigInteger('area_id')->unsigned()->nullable();
            $table->timestamps();

            // $table->foreign('area_id')->on('area')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_wesel');
    }
};