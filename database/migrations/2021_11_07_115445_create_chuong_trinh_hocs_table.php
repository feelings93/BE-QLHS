<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChuongTrinhHocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chuong_trinh_hocs', function (Blueprint $table) {
            $table->bigIncrements('maCTH');
            $table->bigInteger('maKhoi')->unsigned();
            $table->bigInteger('maMH')->unsigned();
            $table->float('heSo');
            $table->foreign('maKhoi')->references('maKhoi')->on('khois')->onDelete('cascade');
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
        Schema::dropIfExists('chuong_trinh_hocs');
    }
}
