<?php

namespace App\Http\Controllers;
use App\Models\Course;
use OpenApi\Attributes as OA;

use Illuminate\Http\Request;

#[OA\Info(
    version: '1.0.0',
    description: 'API endpoint',
    title: 'Api'
)]

#[OA\PathItem(
    path:"/api/"
)]
class UserController extends Controller
{



    #[OA\Get(
            path:"/api/hello/{name}",
            summary:"Get hello name",
            tags:["name"],
            parameters:[
                new OA\Parameter(
                    name:"name",
                    description:"Get hello name",
                    in:"path",
                    required:true,
          )],
        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(
                        properties: [new OA\Property(
                        property:"message",
                        type:"string",
                        example:"hello Pavel")
                ]
            ))]


)]

    public function show($name){

        return response()->json(['message'=>'hello '.$name]);

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

public function index(){
       $courses=Course::all();
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
    public function view($courseId){
        $courses=Course::query()->findOrFail($courseId);
        return response()->json($courses);
    }








}


