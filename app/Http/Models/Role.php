<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'role_id';
    protected $fillable = ['role_name','ps_id','role_remark'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    //角色与权限1对多
    public function permission()
    {
        return $this->hasMany('\App\Http\Models\Permission','ps_id','ps_id');
    }
}
