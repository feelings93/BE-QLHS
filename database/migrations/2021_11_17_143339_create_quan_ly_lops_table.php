<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuanLyLopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quan_ly_lops', function (Blueprint $table) {
            $table->bigIncrements('maQLL');
            $table->bigInteger('maHK')->unsigned();
            $table->bigInteger('maLop')->unsigned();
            $table->bigInteger('maGV')->unsigned();
            $table->bigInteger('maLopTruong')->unsigned();
            $table->foreign('maHK')->references('maHK')->on('hoc_kies')->onDelete('cascade');
            $table->foreign('maLop')->references('maLop')->on('lops')->onDelete('cascade');
            $table->foreign('maGV')->references('maGV')->on('giao_viens')->onDelete('cascade');
            $table->foreign('maLopTruong')->references('maHS')->on('hoc_sinhs')->onDelete('cascade');



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
        Schema::dropIfExists('quan_ly_lops');
    }
}
