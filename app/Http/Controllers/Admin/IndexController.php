<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $mg_id = Auth::guard('admin')->user()->mg_id;
        $roleinfo = \DB::table('manager as m')->
            join('role as r','m.mg_role_ids','=','r.role_id')
            ->select('ps_id')->where('m.mg_id',$mg_id)
            ->first();
        try {
            $ps_id = explode(',',$roleinfo->ps_id);
            $permissionA = \DB::table('permission')
                ->whereIn('ps_id',$ps_id)
                ->where('ps_level','0')
                ->get();
            $permissionB = \DB::table('permission')
                ->whereIn('ps_id',$ps_id)
                ->where('ps_level',1)
                ->get();
        }catch(\Exception $e)
        {
            if($mg_id == 52)
            {
                $permissionA = \DB::table('permission')->
                    where('ps_level','0')->get();
                $permissionB = \DB::table('permission')->
                    where('ps_level','1')->get();
            }else
            {
                $permissionA = [];
                $permissionB = [];
            }
        }
        return view('admin/index/index',compact('permissionA','permissionB'));
    }

    public function home()
    {
        return view('admin/index/home');
    }
}
