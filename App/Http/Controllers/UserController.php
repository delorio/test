<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserController extends Controller
{
//    public function show($name){
//
//
//        return response()->json($name);
//
//    }

public function do(){
    for($i=0; $i<10; $i++){



//    echo $i .'</br>';
        return $i;

    }


}
}
