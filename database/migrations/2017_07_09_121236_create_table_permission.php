<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission',function(Blueprint $table){
            $table->increments('ps_id')->comment('主键');
            $table->string('ps_name',30)->comment('权限名称');
            $table->integer('ps_pid')->comment('权限父id');
            $table->string('ps_c',20)->nullable()->comment('控制器');
            $table->string('ps_a',20)->nullable()->comment('操作方法');
            $table->string('ps_address')->nullable()->comment('路由');
            $table->text('ps_remark')->nullable()->comment('备注');
            $table->timestamps();
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
        Schema::dropIfexists('permission');
    }
}
