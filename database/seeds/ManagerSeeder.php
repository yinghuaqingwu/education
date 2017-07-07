<?php

use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['男','女'];
        $arr_num = [100,101,102];
        //模拟测试数据
        $faker = \Faker\Factory::create('zh_CN');
        for($i=0;$i<50;$i++)
        {
            \App\Http\Models\Manager::create([
                'username' => $faker->name,
                'password' => bcrypt(123456),
                'mg_role_ids' => $arr_num[array_rand($arr_num)],
                'mg_sex' => $arr[array_rand($arr)],
                'mg_phone' => $faker->phoneNumber,
                'mg_email' => $faker->email,
                'mg_remark' => $faker->catchPhrase,
                'created_at' => $faker->date(),
                ]);
        }
    }
}
