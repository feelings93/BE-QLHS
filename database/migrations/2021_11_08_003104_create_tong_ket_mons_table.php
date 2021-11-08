<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTongKetMonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tong_ket_mons', function (Blueprint $table) {
            $table->bigIncrements('maTKM');
            $table->bigInteger('maLop')->unsigned();
            $table->bigInteger('maHK')->unsigned();
            $table->bigInteger('maMH')->unsigned();
            $table->integer('soLuongDat')->unsigned();
            $table->float('tiLe');
            $table->integer('siSo')->unsigned();
            $table->foreign('maLop')->references('maLop')->on('lops')->onDelete('cascade');
            $table->foreign('maHK')->references('maHK')->on('hoc_kies')->onDelete('cascade');
            $table->foreign('maMH')->references('maMH')->on('mon_hocs')->onDelete('cascade');
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
        Schema::dropIfExists('tong_ket_mons');
    }
}
