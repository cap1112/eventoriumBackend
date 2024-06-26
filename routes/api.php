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

Route::get('/userEventsIncomplete/{id}', [ApiController::class, 'userEventsIncomplete']);
Route::get('/userEventsComplete/{id}', [ApiController::class, 'userEventsComplete']);

Route::post('/user/create', [ApiController::class, 'userStore']);
Route::post('/user/logIn', [ApiController::class, 'userlogIn']);
Route::post('/updateProfile', [ApiController::class, 'updateProfile']);
Route::get('/enrollCourse/{id}', [ApiController::class, 'userEnrollCourses']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/token', [ApiController::class, 'token']);
});


// Route::middleware('auth:sanctum')->get('/user/logout', [ApiController::class, 'userlogOut']);