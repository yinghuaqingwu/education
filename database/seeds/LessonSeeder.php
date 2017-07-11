<?php

use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return
     */
    public function run()
    {
        \DB::table('lesson')->insert([
            ['course_id'=>10,'lesson_name'=>'jquery选择器使用','cover_img'=>'','video_address'=>'','lesson_desc'=>'好课'],
            ['course_id'=>10,'lesson_name'=>'jquery面向对象','cover_img'=>'','video_address'=>'','lesson_desc'=>'好课'],
            ['course_id'=>11,'lesson_name'=>'linux基础命令','cover_img'=>'','video_address'=>'','lesson_desc'=>'好课'],
            ['course_id'=>11,'lesson_name'=>'linux服务器搭建','cover_img'=>'','video_address'=>'','lesson_desc'=>'好课'],
            ['course_id'=>11,'lesson_name'=>'linuxshell编程','cover_img'=>'','video_address'=>'','lesson_desc'=>'好课'],
        ]);
    }
}
