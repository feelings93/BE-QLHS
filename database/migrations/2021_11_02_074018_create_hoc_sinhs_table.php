<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHocSinhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoc_sinhs', function (Blueprint $table) {
            $table->bigIncrements('maHS');
            $table->string('hoTen', 100);
            $table->string('gioiTinh', 5);
            $table->date('ngaySinh');
            $table->string('diaChi');
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
        Schema::dropIfExists('hoc_sinhs');
    }
}
