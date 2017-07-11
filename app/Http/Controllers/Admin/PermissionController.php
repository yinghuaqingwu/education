<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Permission;
use Illuminate\Support\Facades\Validator;

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
        if($request->isMethod('post'))
        {
            $rules = [
                'ps_name' => 'required|unique:permission,ps_name'
            ];
            $notices = [
                'ps_name.required' => '权限名称不能为空'
            ];
            $validator = Validator::make($request->all(),$rules,$notices);
            if($validator->passes())
            {
                $data = $request->all();
                Permission::create($data);
                return ['success'=>true];
            }else
            {
                $errorinfo = collect($validator->messages)->implode('0','|');
                return ['success'=>false,'errorinfo'=>$errorinfo];
            }
        }
        $permissionA = Permission::where('ps_level','0')->pluck('ps_id','ps_name');
        return view('admin/permission/add',compact('permissionA'));
    }
}
