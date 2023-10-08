<?php

namespace App\Http\Controllers;

use App\Http\DTO\CourseDTO\CourseDTO;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Services\CoursesServices;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

#[OA\Info(
    version: '1.0.0',
    description: 'API endpoint',
    title: 'Api'
)]
#[OA\PathItem(
    path: "/api/"
)]
class CoursesController extends Controller
//class CoursesController extends CommandController
{

    public function __construct(CoursesServices $courseService)
    {
        $this->courseService = $courseService;
    }

    #[OA\Get(
        path: "/api/courses",
        summary: "Get courses",
        tags: ["courses"],

        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(
//
                    ref: '#/components/schemas/CoursesResponse'
                )
            )
        ]


    )]
    public function CoursesIndex()
    {
        $courses = $this->courseService->index();
        return response()->json(['data' => $courses]);
    }


    #[OA\Get(
        path: "/api/courses/{courseId}",
        summary: "Get course",
        tags: ["courses"],
        parameters: [
            new OA\Parameter(
                name: "courseId",
                description: "Get course",
                in: "path",
                required: true,
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(

                    ref: '#/components/schemas/CoursesResponse'
                )
            )
        ]
    )]
    public function CourseView($courseId)
    {
        $course = $this->courseService->view($courseId);
        return response()->json(['data' => $course]);
    }


    #[OA\Post(
        path: "/api/courses",
        summary: "Create courses",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent
            (
//
                ref: '#/components/schemas/CoursesRequestsBodies'
            )
        ),
        tags: ["courses"],
        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(
//
                    ref: '#/components/schemas/CoursesResponse'
                )
            )
        ]
    )]
    public function CreateCourse(CourseRequest $request)
    {
        $courseDTO = new CourseDTO();
        $courseDTO->buildFromArray($request->validated());
        $course = $this->courseService->create($courseDTO);
        return response()->json(['data'=>$course]);

    }


    #[OA\Put(
        path: "/api/courses/{courseId}",
        summary: "Update courses",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent
            (
                ref: '#/components/schemas/CoursesRequestsBodies'
            )
        ),
        tags: ["courses"],
        parameters: [
            new OA\Parameter(
                name: "courseId",
                description: "Get course",
                in: "path",
                required: true,
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(

                    ref: '#/components/schemas/CoursesResponse'
                )
            )
        ]
    )]
    public function UpdateCourse( int $courseId, CourseRequest $request)
    {
        $courseDTO = new CourseDTO();
        $courseDTO->buildFromArray($request->validated());
        $course = $this->courseService->update($courseId, $courseDTO);
        return response()->json(['data' => $course]);
    }


    #[OA\Delete(
        path: "/api/courses/{courseId}",
        summary: "Delete course",
        tags: ["courses"],
        parameters: [
            new OA\Parameter(
                name: "courseId",
                description: "Delete course",
                in: "path",
                required: true,
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(
//                    properties: [
//                        new OA\Property(property: "message", type: "string", example: "удалено"),
//
//                    ]
                    ref: '#/components/schemas/DeleteCoursesResponse'
                )
            )
        ]
    )]
    public function DeleteCourse($courseId)
    {
        $course = $this->courseService->delete($courseId);
        return response()->json(['data' => $course]);
    }


}


