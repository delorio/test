<?php

namespace App\Http\Resources\RequestsBodies;

use OpenApi\Attributes as OA;
#[OA\RequestBody(
    request: 'CourseRequestBody',
    description: 'Course request body',
    required: true,
    content: [
        new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                ref: '#/components/schemas/CoursesRequestsBodies'
            )
        )
    ]
)]

#[OA\Schema(
    required: ['courseId','name','description']
)]
class CoursesRequestsBodies
{

    #[OA\Property(
        example: 'PHP'
    )]
    public string $name;

    #[OA\Property(
        example: 'PHP Courses'
    )]
    public string $description;

//    #[OA\Property(
//        example: 1
//    )]
//    public int $courseId;


}


