<?php

namespace App\Http\Resources\Schemas;

use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    required: ['course_id', 'name','description','lessonId']
)]
class LessonSchemas extends JsonResource
{
    #[OA\Property(
        maxLength: 16,
        example: 'abc'
    )]
    public string $name;

    #[OA\Property(
        maxLength: 64,
        example: 2
    )]
    public int $lesson_id;

    #[OA\Property(
        maxLength: 255,
        example: 'HELLO'
    )]
    public string $description;

    #[OA\Property(
        maxLength: 64,
        example: 4
    )]
    public int $course_id;

}
