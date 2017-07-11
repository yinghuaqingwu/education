<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Home\IndexController@index');


Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    //后台管理员登录操作
    Route::match(['get','post'],'manager/login','ManagerController@login')->name('login');
    //用户认证登录，防止越权登录
    Route::group(['middleware'=>['auth:admin']],function(){
        //首页
        Route::get('index/index','IndexController@index');
        Route::get('index/home','IndexController@home');
        Route::group(['middleware'=>['jumpwall']],function(){
            //管理员列表
            Route::match(['get','post'],'manager/showlist','ManagerController@showlist');
            //管理员添加
            Route::match(['get','post'],'manager/add','ManagerController@add');
            //管理员更新操作
            Route::match(['get','post'],'manager/update/{manager}','ManagerController@update');
            //管理员删除操作
            Route::post('manager/del/{manager}','ManagerController@del');
            //管理员批量删除
            Route::post('manager/dels','ManagerController@dels');
            //管理员启用停用操作
            Route::post('manager/start_stop/{mg_id}','ManagerController@start_stop');
            //管理员退出操作
            Route::get('manager/logout','ManagerController@logout');
            //管理员上传头像操作
            Route::match(['get','post'],'manager/up_pic','ManagerController@up_pic');
            //角色管理列表展示操作
            Route::match(['get','post'],'role/showlist','RoleController@showlist');
            //角色添加操作
            Route::match(['get','post'],'role/add','RoleController@add');
            //角色更新操作
            Route::match(['get','post'],'role/update/{role}','RoleController@update');
            //删除权限操作
            Route::post('role/del','RoleController@del');
            //权限列表显示
            Route::get('permission/showlist','PermissionController@showlist');
            //添加权限操作
            Route::match(['get','post'],'permission/add','PermissionController@add');
            //展示课时列表
            Route::match(['get','post'],'lesson/showlist','LessonController@showlist');
            //添加课时操作
            Route::match(['get','post'],'lesson/add','LessonController@add');
            //上传课时封面操作
            Route::match(['get','post'],'lesson/up_pic','LessonController@up_pic');
            //上传课时视频操作
            Route::match(['get','post'],'lesson/up_video','LessonController@up_video');
        });

    });

});