<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//for($i=0; $i<10; $i++){
//
//    echo $i;
//
//}
Route::get('/', function () {

//    phpinfo();
    return view('welcome');
});

Route::get('/user',[\App\Http\Controllers\CoursesController::class, 'do']);
