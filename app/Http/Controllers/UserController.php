<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     title="My doc api",
 *     version="1.0.0"
 * ),
 * @OA\PathItem(
 *     path="/api/"
 * )
.*/
class UserController extends Controller
{
    /**
    @OA\Get(
     *        path="/api/hello/{name}",
     *        summary="Get hello name",
     *        tags={"name"},
     *        @OA\Parameter(
     *        description="Get hello name",
     *        in="path",
     *        name="name",
     *        required=true,
     *
     *        ),
     *
     *         @OA\Response(
     *            response=200,
     *            description="ok",
     *              @OA\JsonContent(
     *                              @OA\Property(property="message", type="string", example="hello Pavel"),
     *
     *              ),
     *        ),
     *  ),
     *
     */

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
