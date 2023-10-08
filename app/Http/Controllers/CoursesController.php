<?php

namespace App\Http\Controllers;

use App\Http\DTO\CourseDTO\CourseDTO;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Services\CoursesServices;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
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
{

    public function __construct(private readonly CoursesServices $courseService)
    {

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
                    ref: '#/components/schemas/CoursesResponse'
                )
            )
        ]

    )]
    public function indexCourses(): JsonResponse
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
    public function ViewCourse(int $courseId): JsonResponse
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
    public function createCourse(CourseRequest $request): JsonResponse
    {
        $courseDTO = new CourseDTO();
        $courseDTO->buildFromArray($request->validated());
        $course = $this->courseService->create($courseDTO);
        return response()->json(['data' => $course]);
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
    public function updateCourse(int $courseId, CourseRequest $request): JsonResponse
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
                    ref: '#/components/schemas/DeleteCoursesResponse'
                )
            )
        ]
    )]
    public function deleteCourse(int $courseId): JsonResponse
    {
        $course = $this->courseService->delete($courseId);
        return response()->json(['data' => $course]);
    }


}


