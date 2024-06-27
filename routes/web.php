<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\AccessPanelController;

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


// Route::get('/', function () {
//      return view('layout');
// });

// Route::get('/layout', function () {
//     return view('layout');
// });

Route::resource('/users', UsersController::class)->middleware('auth');
Route::resource('/events', EventsController::class)->middleware('auth');
Route::resource('/courses', CoursesController::class)->middleware('auth');
// Route::resource('/access', AccessPanelController::class);

Route::get('/access/index', [AccessPanelController::class, 'index'])->name('access.index');
Route::get('/access/login', [AccessPanelController::class, 'login'])->name('access.login');
Route::get('/access/logout', [AccessPanelController::class, 'logout'])->name('access.logout');
// Route::resource('events/index', EventsController::class, ['only' => ['index']]);
