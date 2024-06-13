<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
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

Route::get('/layout', function () {
    return view('layout');
});

Route::get('/users/index', function () {
    return view('users.index');
});
Route::get('/users/create', function () {
    return view('users.create');
});

Route::get('/users/all', [UsersController::class, 'index']);