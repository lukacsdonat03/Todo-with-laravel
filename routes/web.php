<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;

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

Route::get('/',[TodoListController::class, 'index']);

Route::post('/saveItemRoute',[TodoListController::class,'saveItem'])->name('saveItem'); //action tag miatt kell a name 

Route::post('/markCompleted/{id}',[TodoListController::class,'markCompleted'])->name('markCompleted');

Route::post('/markInCompleted/{id}',[TodoListController::class,'markInCompleted'])->name('markInCompleted');

//Login routes (TODO: később Controllerbe kiszervezés)

Route::get('/login',function(){
    return view('login');
});

//Register routes (TODO: később controller)

Route::get('/register',function(){
    return view('register');
});