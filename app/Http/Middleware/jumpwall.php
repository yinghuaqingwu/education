<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class jumpwall
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //获取登录用户信息
        $mg_id = Auth::guard('admin')->user()->mg_id;
        $username = Auth::guard('admin')->user()->username;
        if($username != 'admin')
        {
            $nowCA = getCurrentControllerName()."-".getCurrentMethodName();
            $roleinfo = \DB::table('manager as m')
                ->join('role as r','m.mg_role_ids',"=",'r.role_id')
                ->where('m.mg_id',$mg_id)
                ->select('r.role_ps_ac')->first();
            $haveCA = $roleinfo->role_ps_ac;
            if(strpos($haveCA,$nowCA) === false){
                exit('您没有权限访问');
            }
        }
        return $next($request);
    }
}
