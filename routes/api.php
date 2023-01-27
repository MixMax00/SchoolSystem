<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Teacher\LoginController;
use App\Http\Controllers\Api\Student\StudentLoginController;
use App\Http\Controllers\Api\Student\StudentProfileController;
use App\Http\Controllers\Api\Teacher\TeacherProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('teacher/login', [LoginController::class, "login"]);
Route::post('student/login', [StudentLoginController::class, "login"]);

Route::group(["middleware" => ["auth:teacherApi"]], function(){
    Route::prefix('teacher')->group(function(){
        Route::get('profile', [TeacherProfileController::class, 'profile']);
        Route::post('logout', [TeacherProfileController::class, 'logout']);
    });
});

Route::group(["middleware" => ["auth:studentApi"]], function(){
    Route::prefix('student')->group(function(){
        Route::get('profile', [StudentProfileController::class, 'profile']);
        Route::post('logout', [StudentProfileController::class, 'logout']);
    });
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
