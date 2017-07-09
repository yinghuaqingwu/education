<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Role;

class RoleController extends Controller
{
    #角色列表显示
    public function showlist(Role $role)
    {
        $info = $role->get();
        return view('admin/role/showlist',compact('info'));
    }

    #角色添加操作
    public function add()
    {
        return view('admin/role/add');
    }

}
