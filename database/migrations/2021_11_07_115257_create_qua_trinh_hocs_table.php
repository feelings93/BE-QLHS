<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuaTrinhHocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qua_trinh_hocs', function (Blueprint $table) {
            $table->bigIncrements('maQTH');
            $table->bigInteger('maLop')->unsigned();
            $table->bigInteger('maHS')->unsigned();
            $table->bigInteger('maHK')->unsigned();
            $table->float('diemTB');
            $table->foreign('maLop')->references('maLop')->on('lops')->onDelete('cascade');
            $table->foreign('maHS')->references('maHS')->on('hoc_sinhs')->onDelete('cascade');
            $table->foreign('maHK')->references('maHK')->on('hoc_kies')->onDelete('cascade');
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
        Schema::dropIfExists('qua_trinh_hocs');
    }
}
