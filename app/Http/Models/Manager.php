<?php

namespace App\Http\Models;

use Illuminate\Foundation\Auth\User as Authenticate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manager extends Authenticate
{
    protected $table = 'manager';
    protected $primaryKey = "mg_id";
    protected $fillable = ['username','password','mg_pic','mg_role_ids','mg_sex','mg_phone','mg_email','mg_remark','mg_status'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
