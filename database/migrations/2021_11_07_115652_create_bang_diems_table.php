<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBangDiemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bang_diems', function (Blueprint $table) {
            $table->bigIncrements('maBD');
            $table->bigInteger('maMH')->unsigned();
            $table->bigInteger('maQTH')->unsigned();
            $table->float('diemTBM');
            $table->foreign('maQTH')->references('maQTH')->on('qua_trinh_hocs')->onDelete('cascade');
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
        Schema::dropIfExists('bang_diems');
    }
}
