<?php

namespace App\Services;

use App\Http\DTO\CourseDTO\CourseDTO;
use App\Models\Course;
use Illuminate\Database\Eloquent\Collection;


class CoursesServices
{


    public function index(): Collection
    {
        $courses = Course::all();
        return $courses;
    }

    public function view($courseId): Course
    {
        $courses = Course::query()->findOrFail($courseId);
        return $courses;
    }

    public function create(CourseDTO $courseDTO): Course
    {
        $course = Course::query()->create([
            'name' => $courseDTO->name,
            'description' => $courseDTO->description,
        ]);
        return $course;
    }


    public function update(int $courseId, CourseDTO $courseDTO): Course
    {
        $course = Course::query()->findOrFail($courseId);

        $course->update([
            'name' => $courseDTO->name,
            'description' => $courseDTO->description,
        ]);
        return $course;
    }


    public function delete($courseId): array
    {
        $courses = Course::query()->findOrFail($courseId)->delete();
        return ['massage' => 'удалено'];
    }

}
