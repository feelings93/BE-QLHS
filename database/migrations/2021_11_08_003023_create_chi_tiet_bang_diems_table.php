<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietBangDiemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_bang_diems', function (Blueprint $table) {
            $table->bigIncrements('maCTBD');
            $table->bigInteger('maLHKT')->unsigned();
            $table->bigInteger('maBD')->unsigned();
            $table->float('diem');
            $table->foreign('maBD')->references('maBD')->on('bang_diems')->onDelete('cascade');
            $table->foreign('maLHKT')->references('maLHKT')->on('loai_hinh_kiem_tras')->onDelete('cascade');
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
        Schema::dropIfExists('chi_tiet_bang_diems');
    }
}
