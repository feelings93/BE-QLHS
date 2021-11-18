<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHanhKiemHocPhiBaoHiemToQthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qua_trinh_hocs', function (Blueprint $table) {
            $table->boolean('hocPhi')->default(false)->after('maHK');
            $table->boolean('baoHiem')->default(false)->after('hocPhi');
            $table->string('hanhKiem')->default("Tốt")->after('baoHiem');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qua_trinh_hocs', function (Blueprint $table) {
            $table->dropColumn('hocPhi');
            $table->dropColumn('baoHiem');
            $table->dropColumn('hanhKiem');

        });
    }
}
