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
        Schema::dropIfExists('sub_kriteria');
        Schema::create('sub_kriteria', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_kriteria');
            $table->foreign('id_kriteria')->references('id')->on('kriteria');
            $table->string('nama');
            $table->unsignedInteger('nilai')->default(0);
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
        Schema::dropIfExists('sub_kriteria');
    }
};
