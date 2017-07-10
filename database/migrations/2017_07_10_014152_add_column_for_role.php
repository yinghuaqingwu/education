<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnForRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role',function(Blueprint $table){
            $table->string('role_ps_ac',60)->comment('权限控制方法')->after('ps_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role',function(Blueprint $table){
            $table->dropColumn('role_ps_ac');
        });
    }
}
