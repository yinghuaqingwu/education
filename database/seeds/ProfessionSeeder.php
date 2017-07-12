<?php

use Illuminate\Database\Seeder;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('profession')->insert([
            ['pro_name'=>'全栈','pro_desc'=>'全栈工程师'],
            ['pro_name'=>'PHP','pro_desc'=>'PHP工程师'],
            ['pro_name'=>'前端','pro_desc'=>'前端工程师'],
        ]);
    }
}
