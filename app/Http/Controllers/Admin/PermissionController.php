<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Permission;

class PermissionController extends Controller
{
    #权限列表显示
    public function showlist(Permission $permission)
    {
        $info = $permission->get()->toarray();
        $info = generateTree($info);
        return view('admin/permission/showlist',compact('info'));
    }

    #添加权限操作
    public function add(Request $request)
    {
        return view('admin/permission/add');
    }
}
