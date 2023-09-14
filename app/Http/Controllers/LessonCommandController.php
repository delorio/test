<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class LessonCommandController extends Controller
{


    #[OA\Get(
        path:"/api/lessons",
        summary:"Get lessons",
        tags:["lessons"],

        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content:
                new OA\JsonContent(
                    example: [
                        new OA\Property(property:"lessonId", type:"integer", example:"3"),
                        new OA\Property(property:"name", type:"string", example:"Zula Ferry"),
                        new OA\Property(property:"description", type:"string", example:"Et qui aliquam deleniti non dolorem. Dolore incidunt magni eveniet eius in ut qui. Praesentium impedit ut velit magni nostrum.")

                    ]

                )
            )]


    )]

    public function IndexLessons(){
        $lessons= Lesson::all();
        return response()->json($lessons);
    }






    #[OA\Get(
        path:"/api/lessons/{lessonId}",
        summary:"Get lesson",
        tags:["lessons"],
        parameters:[
            new OA\Parameter(
                name:"lessonId",
                description:"Get lesson",
                in:"path",
                required:true,
            )],
        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property:"lessonId", type:"integer", example:"3"),
                        new OA\Property(property:"name", type:"string", example:"Zula Ferry"),
                        new OA\Property(property:"description", type:"string", example:"Et qui aliquam deleniti non dolorem. Dolore incidunt magni eveniet eius in ut qui. Praesentium impedit ut velit magni nostrum.")

                    ]
                ))]
    )]


    public function ViewLesson($lessonsId){
        $lessons=Lesson::query()->findOrFail($lessonsId);
        return response()->json($lessons);
    }





    #[OA\Post(
        path:"/api/lessons",
        summary:"Create lessons",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent
            (
                properties: [
                    new OA\Property(property:"name", type:"string", example:"Zula Ferry"),
                    new OA\Property(property:"description", type:"string", example:"Et qui aliquam deleniti non dolorem. Dolore incidunt magni eveniet eius in ut qui. Praesentium impedit ut velit magni nostrum.")

                ]
            )
        ),
        tags:["lessons"],
        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property:"lessonId", type:"integer", example:"3"),
                        new OA\Property(property:"name", type:"string", example:"Zula Ferry"),
                        new OA\Property(property:"description", type:"string", example:"Et qui aliquam deleniti non dolorem. Dolore incidunt magni eveniet eius in ut qui. Praesentium impedit ut velit magni nostrum.")

                    ]
                ))]
    )]

    public function CreateLesson(Request $request){
        $lessons=Lesson::query()->create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
        ]);
        return response()->json($lessons);
    }


    #[OA\Put(
        path:"/api/lessons/{lessonId}",
        summary:"Update lesson",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent
            (
                properties: [
                    new OA\Property(property:"name", type:"string", example:"Zula Ferry"),
                    new OA\Property(property:"description", type:"string", example:"Et qui aliquam deleniti non dolorem. Dolore incidunt magni eveniet eius in ut qui. Praesentium impedit ut velit magni nostrum.")
                ]
            )
        ),
        tags:["lessons"],
        parameters:[
            new OA\Parameter(
                name:"lessonId",
                description:"Update lesson",
                in:"path",
                required:true,
            )],
        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property:"lessonId", type:"integer", example:"3"),
                        new OA\Property(property:"name", type:"string", example:"Zula Ferry"),
                        new OA\Property(property:"description", type:"string", example:"Et qui aliquam deleniti non dolorem. Dolore incidunt magni eveniet eius in ut qui. Praesentium impedit ut velit magni nostrum.")

                    ]
                ))]
    )]

    public function UpdateLesson( Request $request, $lessonsId){
        $lessons=Lesson::query()->findOrFail($lessonsId);
        $lessons->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
        ]);
        return response()->json($request);
    }


    #[OA\Delete(
        path:"/api/lessons/{lessonId}",
        summary:"Delete lesson",
        tags:["lessons"],
        parameters:[
            new OA\Parameter(
                name:"lessonId",
                description:"Delete lesson",
                in:"path",
                required:true,
            )],
        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property:"message", type:"string", example:"удалено"),

                    ]
                ))]
    )]

    public function DeleteLesson($lessonsId){
        $lessons=Lesson::query()->findOrFail($lessonsId)->delete();
        return response()->json(['massage'=>'удалено']);
    }



}
