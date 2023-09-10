<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//for ($i=0; $i<10; $i++){
//    $arr[]=$i;
//}
class UserController extends Controller
{
//    public function show($name){
//
//
//        return response()->json($name);
//
//    }

public function do(){
//phpinfo();
    for ($i=0; $i<10; $i++){
        $arr[]=$i;
    }
var_dump($arr);


}
}
