<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserController extends Controller
{


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
