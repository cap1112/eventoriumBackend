<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\CoursesController;


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


Route::get('/', function () {
     return view('layout');
});

// Route::get('/layout', function () {
//     return view('layout');
// });

Route::resource('/users', UsersController::class);



Route::resource('/events', EventsController::class);
Route::resource('/courses', CoursesController::class);

// Route::resource('events/index', EventsController::class, ['only' => ['index']]);
