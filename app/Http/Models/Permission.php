<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    protected $table = 'permission';
    protected $primaryKey = "ps_id";
    protected $fillable = ['ps_name','ps_pid','ps_c','ps_a','ps_address','ps_remark'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
