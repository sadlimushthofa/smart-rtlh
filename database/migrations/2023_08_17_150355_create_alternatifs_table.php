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
        Schema::dropIfExists('alternatif');
        Schema::disableForeignKeyConstraints();

        Schema::create('alternatif', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_warga');
            $table->foreign('id_warga')->references('id')->on('warga');
            $table->unsignedInteger('id_kriteria');
            $table->foreign('id_kriteria')->references('id')->on('kriteria')->onDelete('cascade');
            $table->integer('nilai');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alternatif');
    }
};
