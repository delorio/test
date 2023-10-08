<?php

namespace App\Http\DTO\LessonDTO;

use App\Http\DTO\BaseDTO;
use Illuminate\Http\Request;

class LessonDTO extends BaseDTO
{
    public string $name;
    public string $description;
    public int $course_id;

    public function build(Request $request): self
    {
        $this->buildFromRequest($request);
        return $this;
    }
}
