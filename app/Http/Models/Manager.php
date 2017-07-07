<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manager extends Model
{
    protected $table = 'manager';
    protected $primaryKey = "mg_id";
    protected $fillable = ['username','password','mg_role_ids','mg_sex','mg_phone','mg_email','mg_remark'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
