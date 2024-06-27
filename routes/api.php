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

Route::get('/calendar/{id}', [ApiController::class, 'userEventCalendar']);
Route::get('/userEvents/{id}', [ApiController::class, 'userCourseEvents']);
Route::get('/eventDetail/{id}', [ApiController::class, 'userCourseEventDetail']);
Route::get('/userEventDetail/{idEvent}/{idUser}', [ApiController::class, 'userEvent']);

Route::get('/userCourses/{id}', [ApiController::class, 'userCourses']);
Route::get('/categories', [ApiController::class, 'categories']);

Route::get('/searchUserEvents/{userId}', [ApiController::class, 'searchUserEvents']);
Route::get('/searchUserEvents/{userId}/{categoryName}', [ApiController::class, 'searchUserEvents_Event']);
Route::get('/searchUserEvents/{userId}//{courseInitial}', [ApiController::class, 'searchUserEvents_Course']);
Route::get('/searchUserEvents/{userId}/{categoryName}/{courseInitial}', [ApiController::class, 'searchUserEvents_Event_Course']);

Route::get('/searchUserEvents_Search/{userId}/{search}', [ApiController::class, 'searchUserEvents_Search']);
Route::get('/searchUserEvents_Search/{userId}/{search}/{categoryName}', [ApiController::class, 'searchUserEvents_Search_Event']);
Route::get('/searchUserEvents_Search/{userId}/{search}//{courseInitial}', [ApiController::class, 'searchUserEvents_Search_Course']);
Route::get('/searchUserEvents_Search/{userId}/{search}/{categoryName}/{courseInitial}', [ApiController::class, 'searchUserEvents_Search_Event_Course']);

Route::get('/userEventsIncomplete/{id}', [ApiController::class, 'userEventsIncomplete']);
Route::get('/userEventsComplete/{id}', [ApiController::class, 'userEventsComplete']);

Route::post('/user/create', [ApiController::class, 'userStore']);
Route::post('/user/logIn', [ApiController::class, 'userlogIn']);
// Route::post('/updateProfile', [ApiController::class, 'updateProfile']);
Route::get('/enrollCourse/{id}', [ApiController::class, 'userEnrollCourses']);


Route::post('/updateProfile', [ApiController::class, 'updateProfile']);
// Route::middleware('auth:sanctum')->post('/updateProfile', [ApiController::class, 'updateProfile']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/token', [ApiController::class, 'token']);
});

