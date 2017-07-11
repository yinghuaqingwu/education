<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    protected $table = 'lesson';
    protected $primaryKey = 'lesson_id';
    protected $fillable = ['course_id','lesson_name','cover_img','video_address','lesson_desc','lesson_duration','teacher_ids'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function course ()
    {
        return $this->hasOne('\App\Http\Models\Course','course_id','course_id');
    }
}
