<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaiHinhKiemTrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_hinh_kiem_tras', function (Blueprint $table) {
            $table->bigIncrements('maLHKT');
            $table->string('tenLHKT', 200);
            $table->float('heSoDiem');
            $table->integer('thoiGianKiemTra')->unsigned();
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
        Schema::dropIfExists('loai_hinh_kiem_tras');
    }
}
