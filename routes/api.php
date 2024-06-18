<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;

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

Route::get('/category/all', [ApiController::class, 'categoryList']);
Route::get('/category/{id}', [ApiController::class, 'categoryDetail']);

Route::get('/course/all', [ApiController::class, 'courseList']);
Route::get('/course/{id}', [ApiController::class, 'courseDetail']);

Route::get('/event/all', [ApiController::class, 'eventList']);
Route::get('/event/{id}', [ApiController::class, 'eventDetail']);

Route::get('/user/all', [ApiController::class, 'userList']);
Route::get('/user/{id}', [ApiController::class, 'userDetail']);

Route::get('/eventCourse/all', [ApiController::class, 'eventCourses']);
Route::get('/eventCourse/course/{id}', [ApiController::class, 'eventCourses_Course']);
Route::get('/eventCourse/event/{id}', [ApiController::class, 'eventCourses_Event']);

Route::get('/userCourse/all', [ApiController::class, 'usersCourses']);
Route::get('/userCourse/course/{id}', [ApiController::class, 'usersCourses_Course']);
Route::get('/userCourse/user/{id}', [ApiController::class, 'usersCourses_User']);

Route::get('/usersEvent/all', [ApiController::class, 'usersEvents']);
Route::get('/usersEvent/event/{id}', [ApiController::class, 'usersEvents_Event']);
Route::get('/usersEvent/user/{id}', [ApiController::class, 'usersEvents_User']);