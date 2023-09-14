<?php

namespace App\Http\Controllers;
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
    path:"/api/"
)]
class CoursesController extends Controller
//class CoursesController extends CommandController
{

    public function __construct(CoursesServices $courseService)
    {
        $this->courseService = $courseService;
    }

    #[OA\Get(
        path:"/api/courses",
        summary:"Get courses",
        tags:["courses"],

        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content:
                new OA\JsonContent(
                    example: [
                            new OA\Property(property:"courseId", type:"integer", example:"1"),
                            new OA\Property(property:"name", type:"string", example:"Miss Ellen Bosco"),
                            new OA\Property(property:"description", type:"string", example:"Aliquam atqueveniam asperiores voluptatem in distinctio ea. Nam est et laborum veniam non.Voluptas animi consequatur sed adipisci. Et laudantium tempora ipsa consequatur sunt.")

                  ]
                )
            )]


    )]
public function CoursesIndex(){
        $courses=  $this->courseService->index();
        return response()->json($courses);
}


    #[OA\Get(
        path:"/api/courses/{courseId}",
        summary:"Get course",
        tags:["courses"],
        parameters:[
            new OA\Parameter(
                name:"courseId",
                description:"Get course",
                in:"path",
                required:true,
            )],
        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property:"courseId", type:"integer", example:"1"),
                        new OA\Property(property:"name", type:"string", example:"Miss Ellen Bosco"),
                        new OA\Property(property:"description", type:"string", example:"Aliquam atque
                         veniam asperiores voluptatem in distinctio ea. Nam est et laborum veniam non.
                          Voluptas animi consequatur sed adipisci. Et laudantium tempora ipsa consequatur sunt."),
                    ]
                ))]
    )]


    public function CourseView($courseId){
        $course= $this->courseService->view($courseId);
        return response()->json($course);

    }



    #[OA\Post(
        path:"/api/courses",
        summary:"Create courses",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent
            (
                properties: [
                    new OA\Property(property:"name", type:"string", example:"Miss Ellen Bosco"),
                    new OA\Property(property:"description", type:"string", example:"Aliquam atque
                         veniam asperiores voluptatem in distinctio ea. Nam est et laborum veniam non.
                          Voluptas animi consequatur sed adipisci. Et laudantium tempora ipsa consequatur sunt."),
                ]
            )
        ),
        tags:["courses"],
        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property:"courseId", type:"integer", example:"1"),
                        new OA\Property(property:"name", type:"string", example:"Miss Ellen Bosco"),
                        new OA\Property(property:"description", type:"string", example:"Aliquam atque
                         veniam asperiores voluptatem in distinctio ea. Nam est et laborum veniam non.
                          Voluptas animi consequatur sed adipisci. Et laudantium tempora ipsa consequatur sunt."),
                    ]
                ))]
    )]

    public function CreateCourse(Request $request){
        $course=$this->courseService->create($request);
        return response()->json($course) ;
    }




    #[OA\Put(
        path:"/api/courses/{courseId}",
        summary:"Update courses",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent
            (
                properties: [
                    new OA\Property(property:"name", type:"string", example:"Miss Ellen Bosco"),
                    new OA\Property(property:"description", type:"string", example:"Aliquam atqueveniam asperiores voluptatem in distinctio ea. Nam est et laborum veniam non.Voluptas animi consequatur sed adipisci. Et laudantium tempora ipsa consequatur sunt."),
                ]
            )
        ),
        tags:["courses"],
        parameters:[
            new OA\Parameter(
                name:"courseId",
                description:"Get course",
                in:"path",
                required:true,
            )],
        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property:"courseId", type:"integer", example:"1"),
                        new OA\Property(property:"name", type:"string", example:"Miss Ellen Bosco"),
                        new OA\Property(property:"description", type:"string", example:"Aliquam atqueveniam asperiores voluptatem in distinctio ea. Nam est et laborum veniam non.Voluptas animi consequatur sed adipisci. Et laudantium tempora ipsa consequatur sunt."),
                    ]
                ))]
    )]


    public function UpdateCourse($courseId,Request $request){
        $course= $this->courseService->update($courseId,$request);
        return response()->json($course);
    }


    #[OA\Delete(
        path:"/api/courses/{courseId}",
        summary:"Delete course",
        tags:["courses"],
        parameters:[
            new OA\Parameter(
                name:"courseId",
                description:"Delete course",
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


    public function DeleteCourse($courseId){
        $course= $this->courseService->delete($courseId);
        return response()->json($course);
    }
















//
//
//
//    #[OA\Get(
//        path:"/api/hello/{name}",
//        summary:"Get hello name",
//        tags:["name"],
//        parameters:[
//            new OA\Parameter(
//                name:"name",
//                description:"Get hello name",
//                in:"path",
//                required:true,
//            )],
//        responses: [
//            new OA\Response(
//                response: 200,
//                description: 'ok',
//                content: new OA\JsonContent(
//                    properties: [new OA\Property(
//                        property:"message",
//                        type:"string",
//                        example:"hello Pavel")
//                    ]
//                ))]
//
//
//    )]
//    public function show($name){
//        return response()->json(['message'=>'hello '.$name]);
//
//    }

}


