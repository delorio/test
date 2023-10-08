<?php

namespace App\Http\Resources\Responses;

use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    required: ["data"]
)]
class LessonResponse extends JsonResource
{

    #[OA\Property(
        type: "array",
        items: new OA\Items(
            ref: '#/components/schemas/LessonSchemas'
        )
    )]


    public object $data;
}
