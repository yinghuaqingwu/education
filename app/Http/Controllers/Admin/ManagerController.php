<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Manager;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    #管理员列表展示
    public function showlist(Manager $manager)
    {
        $count = $manager->count();
        $info = $manager->paginate(8);

        return view('admin/manager/showlist',['info'=>$info,'count'=>$count]);
    }

    #管理员添加
    public function add(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $data['password'] = bcrypt($data['password']);
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

    #管理员登录操作
    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            $username = $request->input('username');
            $password = $request->input('password');
            $rules = [
                'username' => 'required',
                'password' => 'required',
            ];
            $notices = [
                'username.required' => '账户密码不能为空',
                'password.required' => '密码不能为空'
            ];
            $validator = $this->validate($request,$rules,$notices);
            //验证成功，进行用户登录认证，与数据库数据做比对
            if(Auth::guard('admin')->attempt(['username' =>$username ,'password' => $password]))
            {
                return redirect('/admin/index/index');
            }else
            {
                return redirect('/admin/manager/login')->withErrors(['errorinfo'=>'用户名或密码不正确'])->withInput();
            }
            //验证不成功
            return redirect('/admin/manager/login')->withErrors($validator)->withInput();
        }
        return view('admin/manager/login');
    }

    //管理员退出操作
    public function logout()
    {
        Auth::guard('admin')->logout();
      return redirect('admin/manager/login');

    }

    //管理员头像上传操作
    public function up_pic(Request $request)
    {
        $files = $request->file('Filedata');
        if($files->isValid())
        {
            $ext = $files->extension();
            $filename = uniqid('mg_').'.'.$ext;
            $pathinfo = $files->storeAs('manager',$filename,'public');
            if($pathinfo)
            {
                return json_encode(['success'=>true,'pathinfo'=>'/storage/'.$pathinfo]);
            }else
            {
                return json_encode(['success'=>false]);
            }
        }
    }

}
