<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    protected $table="course";
    protected $primaryKey = 'course_id';
    protected $fillable = ['pro_id','course_name','course_price','course_desc','cover_img'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function profession()
    {
        return $this->hasOne('\App\Http\Models\profession','pro_id','pro_id');
    }
}
