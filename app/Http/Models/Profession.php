<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profession extends Model
{
    protected $table = 'profession';
    protected $primaryKey = 'pro_id';
    protected $fillable = ['pro_name','pro_desc','teacher_ids','cover_img','corousel_imgs'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];

}
