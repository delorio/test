<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
});




Route::get('/courses',[\App\Http\Controllers\CoursesController::class, 'indexCourses']);

Route::post('/courses',[\App\Http\Controllers\CoursesController::class, 'createCourse']);


Route::get('/courses/{courseId}',[\App\Http\Controllers\CoursesController::class, 'viewCourse']);

Route::put('/courses/{courseId}',[\App\Http\Controllers\CoursesController::class, 'updateCourse']);

Route::delete('/courses/{courseId}',[\App\Http\Controllers\CoursesController::class, 'deleteCourse']);

Route::get('/hello/{name}',[\App\Http\Controllers\CoursesController::class, 'show']);





Route::get('/lessons',[\App\Http\Controllers\LessonCommandController::class, 'indexLessons']);

Route::post('/lessons',[\App\Http\Controllers\LessonCommandController::class, 'createLesson']);

Route::get('/lessons/{lessonId}',[\App\Http\Controllers\LessonCommandController::class, 'viewLesson']);

Route::put('/lessons/{lessonId}',[\App\Http\Controllers\LessonCommandController::class, 'updateLesson']);

Route::delete('/lessons/{lessonsId}',[\App\Http\Controllers\LessonCommandController::class, 'deleteLesson']);
