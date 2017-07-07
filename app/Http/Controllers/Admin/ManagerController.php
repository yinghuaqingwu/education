<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Manager;

class ManagerController extends Controller
{
    #管理员列表展示
    public function showlist(Manager $manager)
    {
        $info = $manager->paginate(8);

        return view('admin/manager/showlist',['info'=>$info]);
    }

    #管理员添加
    public function add(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $rst = Manager::create($data);
            if($rst)
            {
                return ['success'=>true];
            }else
            {
                return ['success'=>false];
            }
        }
        return view('admin/manager/add');
    }

    #管理员更新
    public function update(Request $request,Manager $manager)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $rst = $manager->update($data);
            if($rst)
            {
                return ['success'=>true];
            }else
            {
                return ['success'=>false];
            }
        }
        return view('admin/manager/update',compact('manager'));
    }

    #管理员删除
    public function del(Request $request,Manager $manager)
    {
        $rst = $manager->delete();
        if($rst)
        {
            return ['success'=>true];
        }else
        {
            return ['success'=>false];
        }
    }

    #批量删除
    public function dels(Request $request,$mg_ids)
    {
        $arr = explode(',',$mg_ids);
        $rst = \DB::table('manager')->whereIn('mg_id',$arr)->delete();
        if($rst)
        {
            return ['success'=>true];
        }else
        {
            return ['success'=>false];
        }
    }

    #启用停用操作
    public function start_stop(Request $request,$mg_id)
    {
        $mg_status = $request->input('mg_status');
        $rst = Manager::where('mg_id',$mg_id)->update(['mg_status' => $mg_status]);
        if($rst)
        {
            return ['success'=>true];
        }else
        {
            return ['success'=>false];
        }
    }

}
