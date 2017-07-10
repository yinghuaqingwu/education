<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Role;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    #角色列表显示
    public function showlist()
    {
        $info = Role::get();
        foreach($info as $v)
        {
            $arr = explode(',',$v->ps_id);
            $psname = Permission::whereIn('ps_id',$arr)->pluck('ps_name','ps_id');
            $v['ps_id'] = $psname;
        }
        return view('admin/role/showlist',compact('info'));
    }

    //角色修改操作
    public function update(Request $request,Role $role)
    {
        if($request->isMethod('post'))
        {
            $rules = [
                'role_name' => 'required|unique:role,role_name,'.$role->role_id.',role_id'
            ];
            $notices = [
                'role_name.required' => '角色名称不为空',
                'role_name.unique' => '角色名称已经存在'
            ];
            $validator = Validator::make($request->all(),$rules,$notices);
            if($validator->passes())
            {
                $role_name = $request->input('role_name');
                $role_remark = $request->input('role_remark');
                $ps_id = implode(',',$request->input('quanxian'));
                $role_ps_ac = Permission::whereIn('ps_id',$request->input('quanxian'))
                            ->select(\DB::raw('concat("ps_c","-","ps_a") as jie'))
                            ->where('ps_level',1)
                            ->pluck('jie');
                $role_ps_ac = implode(',',$role_ps_ac->toarray());
                $role->update([
                    'role_name' => $role_name,
                    'role_remark' => $role_remark,
                    'ps_id' => $ps_id,
                    'role_ps_ac' => $role_ps_ac
                ]);
                return ['success'=>true];
            }else
            {
                $errorinfo = collect($validator->message())->implode('0','|');
                return ['success'=>false,'errorinfo'=>$errorinfo];
            }
        }
        $permissionA = Permission::where('ps_level',0)->pluck('ps_name','ps_id');
        $permissionB = Permission::where('ps_level',1)->get();
        return view('admin/role/update',compact('role','permissionA','permissionB'));
    }

    //添加角色操作
    public function add(Request $request)
    {
        if($request->isMethod('post'))
        {
            $rules = [
                'role_name' => 'required|unique:role,role_name'
            ];
            $notices = [
                'role_name.required' => '角色名称不为空',
                'role_name.unique' => '角色名称已经存在'
            ];
            $validator = Validator::make($request->all(),$rules,$notices);
            if($validator->passes())
            {
                $role_name = $request->input('role_name');
                $role_remark = $request->input('role_remark');
                $ps_id = implode(',',$request->input('quanxian'));
                $role_ps_ac = Permission::whereIn('ps_id',$request->input('quanxian'))
                    ->select(\DB::raw('concat("ps_c","-","ps_a") as jie'))
                    ->where('ps_level',1)
                    ->pluck('jie');
                $role_ps_ac = implode(',',$role_ps_ac->toarray());
                Role::create([
                    'role_name' => $role_name,
                    'role_remark' => $role_remark,
                    'ps_id' => $ps_id,
                    'role_ps_ac' => $role_ps_ac
                ]);
                return ['success'=>true];
            }else
            {
                $errorinfo = collect($validator->message())->implode('0','|');
                return ['success'=>false,'errorinfo'=>$errorinfo];
            }
        }
        $permissionA = Permission::where('ps_level',0)->pluck('ps_name','ps_id');
        $permissionB = Permission::where('ps_level',1)->get();
        return view('admin/role/add',compact('permissionA','permissionB'));
    }

    //权限删除操作
    public function del(Request $request)
    {
        Role::destroy('role_id',$request->all());
        return ['success'=>true];
    }
}
