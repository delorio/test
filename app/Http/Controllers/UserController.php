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



public function do(){
//phpinfo();
    for ($i=0; $i<10; $i++){
        $arr[]=$i;
    }
var_dump($arr);


}
}


