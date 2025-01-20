<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;


//login  API Routes
Route::get('/',[UserController::class,'LoginPage']);
Route::get('/login',[UserController::class,'LoginPage'])->name('login');
Route::get('/register',[UserController::class,'RegisterPage'])->name('register');
Route::post('/login',[UserController::class,'UserLogin']);
Route::post('/register',[UserController::class,'Register']);

Route::get('/logout',[UserController::class,'LogOut']);

//Post Routs 
Route::get('/post',[PostController::class,'index'])->name('post.index');
Route::get('/post_create', [PostController::class, 'create'])->name('post_create');
Route::post('/post_store', [PostController::class, 'store'])->name('post_store');


//Task Routes
Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
Route::post('/tasks', [TaskController::class, 'store'])->name('task.store');
Route::patch('/tasks/{id}', [TaskController::class, 'markAsCompleted'])->name('task.complete');