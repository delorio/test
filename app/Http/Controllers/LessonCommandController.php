<?php

namespace App\Http\Controllers;

use App\Http\DTO\LessonDTO\LessonDTO;
use App\Http\Requests\LessonRequst;
use App\Services\LessonServices;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class LessonCommandController extends Controller
{


    public function __construct(private readonly LessonServices $lessonService)
    {
    }

    #[OA\Get(
        path: "/api/lessons",
        summary: "Get lessons",
        tags: ["lessons"],

        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(
                    ref: '#/components/schemas/LessonResponse'
                )
            )
        ]
    )]
    public function indexLessons(): JsonResponse
    {
        $lessons = $this->lessonService->index();
        return response()->json(['data' => $lessons]);
    }

    #[OA\Get(
        path: "/api/lessons/{lessonId}",
        summary: "Get lesson",
        tags: ["lessons"],
        parameters: [
            new OA\Parameter(
                name: "lessonId",
                description: "Get lesson",
                in: "path",
                required: true,
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(

                    ref: '#/components/schemas/LessonResponse'
                )
            )
        ]
    )]
    public function viewLesson(int $lessonsId): JsonResponse
    {
        $lesson = $this->lessonService->view($lessonsId);
        return response()->json(['data' => $lesson]);
    }

    #[OA\Post(
        path: "/api/lessons",
        summary: "Create lessons",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent
            (
                ref: '#/components/schemas/LessonsRequestsBodies'
            )
        ),
        tags: ["lessons"],
        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(

                    ref: '#/components/schemas/LessonResponse'
                )
            )
        ]
    )]
    public function createLesson(LessonRequst $request): JsonResponse
    {
        $lessonDTO = new LessonDTO();
        $lessonDTO->buildFromArray($request->validated());
        $lesson = $this->lessonService->create($lessonDTO);
        return response()->json(['data' => $lesson]);
    }

    #[OA\Put(
        path: "/api/lessons/{lessonId}",
        summary: "Update lesson",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent
            (
                ref: '#/components/schemas/LessonsRequestsBodies'
            )
        ),
        tags: ["lessons"],
        parameters: [
            new OA\Parameter(
                name: "lessonId",
                description: "Update lesson",
                in: "path",
                required: true,
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(
                    ref: '#/components/schemas/LessonResponse'
                )
            )
        ]
    )]
    public function updateLesson(LessonRequst $request, int $lessonsId): JsonResponse
    {
        $lessonDTO = new LessonDTO();
        $lessonDTO->buildFromArray($request->validated());
        $lesson = $this->lessonService->update($lessonsId, $lessonDTO);
        return response()->json(['data' => $lesson]);
    }

    #[OA\Delete(
        path: "/api/lessons/{lessonId}",
        summary: "Delete lesson",
        tags: ["lessons"],
        parameters: [
            new OA\Parameter(
                name: "lessonId",
                description: "Delete lesson",
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
    public function deleteLesson(int $lessonsId): JsonResponse
    {
        $lessons = $this->lessonService->delete($lessonsId);
        return response()->json(['data' => $lessons]);
    }

}
