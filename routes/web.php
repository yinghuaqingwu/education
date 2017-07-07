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
    //首页
    Route::get('index/index','IndexController@index');
    Route::get('index/home','IndexController@home');
    //管理员列表
    Route::match(['get','post'],'manager/showlist','ManagerController@showlist');
    //管理员添加
    Route::match(['get','post'],'manager/add','ManagerController@add');
    //管理员更新操作
    Route::match(['get','post'],'manager/update/{manager}','ManagerController@update');
    //管理员删除操作
    Route::post('manager/del/{manager}','ManagerController@del');
    //管理员批量删除
    Route::post('manager/dels/{mg_ids}','ManagerController@dels');
    //管理员启用停用操作
    Route::post('manager/start_stop/{mg_id}','ManagerController@start_stop');
});