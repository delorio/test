<?php

namespace App\Services;

use App\Http\DTO\CourseDTO\CourseDTO;
use App\Models\Course;

class CoursesServices
{


    public function index()
    {
        $courses = Course::all();
        return $courses;
    }

    public function view($courseId)
    {
        $courses = Course::query()->findOrFail($courseId);
        return $courses;
    }

    public function create(CourseDTO $courseDTO)
    {
        $course = Course::query()->create([
            'name' => $courseDTO->name,
            'description' => $courseDTO->description,
        ]);
        return $course;
    }


    public function update( int $courseId, CourseDTO $courseDTO)
    {
        $course = Course::query()->findOrFail($courseId);

        $course->update([
            'name' => $courseDTO->name,
            'description' => $courseDTO->description,
        ]);
        return $course;
    }


    public function delete($courseId)
    {
        $courses = Course::query()->findOrFail($courseId)->delete();
        return ['massage' => 'удалено'];
    }

}
