<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home',[ItemController::class,'index']);
Route::get('/jobs', [ItemController::class, 'index'])->name('index');
Route::get('/jobs/create',[ItemController::class, 'create'])->name('create')->middleware('auth');
Route::post('/jobs/store',[ItemController::class, 'store'])->name('store')->middleware('auth');
Route::get('/jobs/{job}/edit',[ItemController::class, 'edit'])->name('edit')->middleware('auth');
Route::put('/jobs/{job}',[ItemController::class, 'update'])->name('update')->middleware('auth');
Route::get('jobs/show/{item}',[ItemController::class, 'show'])->name('show');
Route::delete('/jobs/{job}',[ItemController::class, 'destroy'])->name('destroy')->middleware('auth');
Route::get('/jobs/manage',[ItemController::class,'manage'])->name('manage')->middleware('auth');





//user
Route::get('/users/register', [UserController::class, 'register'])->name('register')->middleware('guest');
Route::post('/users/create', [UserController::class, 'create'])->name('create-user');
Route::get('/users/login',[UserController::class,'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate',[UserController::class, 'authenticate'])->name('authenticate');
Route::get('/users/logout',[UserController::class,'logout'])->name('logout');

