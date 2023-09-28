<?php

namespace App\Services;

use App\Models\Course;

class CoursesServices
{


    public function index(){
        $courses=Course::all();
        return $courses;
    }

    public function view($courseId){
        $courses=Course::query()->findOrFail($courseId);
        return $courses;
    }

    public function create($request){
        $course=Course::query()->create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
        ]);
        return $course;
    }


    public function update($courseId ,$request){
        $course=Course::query()->findOrFail($courseId);

        $course->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
        ]);
        return $course;
    }


    public function delete($courseId){
        $courses=Course::query()->findOrFail($courseId)->delete();
        return ['massage'=>'удалено'];
    }
}
