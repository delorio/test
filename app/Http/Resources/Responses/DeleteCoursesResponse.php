<?php

namespace App\Http\Resources\Responses;

namespace App\Http\Resources\Responses;

use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    required: ["data"]
)]
class DeleteCoursesResponse extends JsonResource
{

    #[OA\Property(
        property: "data",  example: ['message'=>"удалено"]
    )]
//    #[OA\Property(
//            ref: '#/components/schemas/CourseSchemas'
//    )]

    public object $data;
}
