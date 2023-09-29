<?php

namespace App\Http\DTO\CourseDTO;

use App\Http\DTO\BaseDTO;
use Illuminate\Http\Request;
class CourseDTO extends BaseDTO
{
    public string $name;
    public string $description;

    public function build(Request $request): self
    {
        $this->buildFromRequest($request);
        return $this;
    }
}





