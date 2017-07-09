<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Http\Models\Role::create(['role_name' => '董事长', 'ps_id' => 100, 'role_remark' => '公司老大，公司财务掌舵人']);
         \App\Http\Models\Role::create(['role_name' => '主管', 'ps_id' => 101, 'role_remark' => '主管主要负责上下级沟通，上传下达']);
          \App\Http\Models\Role::create(['role_name' => '经理', 'ps_id' => 102, 'role_remark' => '负责管理主管部门，参与公司未来规划']);
    }
}
