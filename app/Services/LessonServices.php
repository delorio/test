<?php

namespace App\Services;


use App\Http\DTO\LessonDTO\LessonDTO;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Collection;

class LessonServices
{

    public function index(): Collection
    {
        $lesson = Lesson::all();
        return $lesson;
    }

    public function view(int $lessonId): Lesson
    {
        $lesson = Lesson::query()->findOrFail($lessonId);
        return $lesson;
    }

    public function create(LessonDTO $lessonDTO): Lesson
    {
        $lesson = Lesson::query()->create([
            'name' => $lessonDTO->name,
            'description' => $lessonDTO->description,
            'course_id' => $lessonDTO->course_id,
        ]);
        return $lesson;
    }


    public function update(int $lessonId, LessonDTO $lessonDTO): Lesson
    {
        $lesson = Lesson::query()->findOrFail($lessonId);

        $lesson->update([
            'name' => $lessonDTO->name,
            'description' => $lessonDTO->description,
            'course_id' => $lessonDTO->course_id,
        ]);
        return $lesson;
    }


    public function delete(int $lessonId): array
    {
        $lesson = Lesson::query()->findOrFail($lessonId)->delete();
        return ['massage' => 'удалено'];
    }

}
