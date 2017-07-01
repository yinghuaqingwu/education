<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{
    #管理员列表展示
    public function showlist()
    {
        return view('admin/manager/showlist');
    }

    #管理员添加
    public function add(Request $request)
    {
        return view('admin/manager/add');
    }

}
