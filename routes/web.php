<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\UserController;


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

Route::get('/',[TodoListController::class, 'index'])->name('home');

Route::post('/saveItemRoute',[TodoListController::class,'saveItem'])->name('saveItem'); //action tag miatt kell a name 

Route::post('/markCompleted/{id}',[TodoListController::class,'markCompleted'])->name('markCompleted');

Route::post('/markInCompleted/{id}',[TodoListController::class,'markInCompleted'])->name('markInCompleted');

Route::get('/login',[UserController::class,'index'])->name('login');
Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/register',[UserController::class,'registerUser'])->name('registerUser');
Route::post('/login',[UserController::class,'loginUser'])->name('loginUser');
Route::get('/logout',[UserController::class,'logout'])->name('logout');