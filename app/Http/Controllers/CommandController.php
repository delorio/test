<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CommandController extends Controller
{



    protected function index($request){
        return response()->json( [$request::all()]);
    }


    public function view($courseId){
        $courses=Course::query()->findOrFail($courseId);
        return response()->json($courses);
    }



    protected function create($request){

        $course=Course::query()->create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
        ]);
        return response()->json($course);
    }




    public function update($courseId ,$request){
        $course=Course::query()->findOrFail($courseId);
        $course->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
        ]);
        return response()->json($request);
    }




    public function delete($courseId){
        $courses=Course::query()->findOrFail($courseId)->delete();
        return response()->json(['massage'=>'удалено']);
    }



}
