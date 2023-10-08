<?php

namespace App\Http\Resources\RequestsBodies;

use OpenApi\Attributes as OA;
#[OA\RequestBody(
    request: 'LessonsRequestsBodies',
    description: 'Lesson request body',
    required: true,
    content: [
        new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                ref: '#/components/schemas/LessonsRequestsBodies'
            )
        )
    ]
)]

#[OA\Schema(
    required: ['course_id','name','description','lessonId']
)]
class LessonsRequestsBodies
{

    #[OA\Property(
        example: 'PHP'
    )]
    public string $name;

    #[OA\Property(
        example: 'PHP Courses'
    )]
    public string $description;

    #[OA\Property(
        example: 1
    )]
    public int $course_id;


}


