<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Course;
use App\Http\Models\Lesson;

class LessonController extends Controller
{
    //展示课时操作
    public function showlist(){
        return view('admin/lesson/showlist');
    }
    //添加课时操作
    public function add(Request $request)
    {
        if($request->isMethod('post'))
        {
            $rules = [
                'lesson_name' => 'required|unique:lesson,lesson_name'
            ];
            $notices = [
                'lesson_name.required' => '课时名称不为空',
                'lesson_name.unique' => '课时名称已经存在'
            ];
            $validator = \Validator::make($request->all(),$rules,$notices);
            if($validator->passes())
            {
                $data = $request->all();
                Lesson::create($data);
                return ['success'=>true];
            }else
            {
                $errorinfo = collect($validator->messages())->implode('0','|');
                return ['success'=>false,'errorinfo'=>$errorinfo];
            }
        }
        $course = Course::pluck('course_name','course_id');
        return view('admin/lesson/add',compact('course'));
    }

    //课程封面上传操作
    public function up_pic(Request $request)
    {
        $files = $request->file('Filedata');
        if($files->isValid())
        {
            $ext = $files->extension();
            $filename = uniqid('le_').'.'.$ext;
            $storage = $files->storeAs('lesson',$filename,'public');
            if($storage)
            {
                return json_encode(['success'=>true,'path'=>'/storage/'.$storage]);
            }else
            {
                return json_encode(['success'=>false]);
            }
        }
    }

    //课程视频上传
    public function up_video(Request $request)
    {
        $files = $request->file('Filedata');
        if($files->isValid())
        {
            $ext = $files->extension();
            $filename = uniqid('v_le_').'.'.$ext;
            $storage = $files->storeAs('lesson/video',$filename,'public');
            if($storage)
            {
                return json_encode(['success'=>true,'path'=>'/storage/'.$storage]);
            }else
            {
                return json_encode(['success'=>false]);
            }
        }
    }
}
