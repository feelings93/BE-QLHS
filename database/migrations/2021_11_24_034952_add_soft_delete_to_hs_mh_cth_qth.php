<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeleteToHsMhCthQth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hoc_sinhs', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('mon_hocs', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('chuong_trinh_hocs', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('qua_trinh_hocs', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hoc_sinhs', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('mon_hocs', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('chuong_trinh_hocs', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('qua_trinh_hocs', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
}
