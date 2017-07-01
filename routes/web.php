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

//首页
Route::get('admin/index/index','Admin\IndexController@index');
Route::get('admin/index/home','Admin\IndexController@home');
//管理员列表
Route::match(['get','post'],'admin/manager/showlist','Admin\ManagerController@showlist');
//管理员添加
Route::match(['get','post'],'admin/manager/add','Admin/ManagerController@add');