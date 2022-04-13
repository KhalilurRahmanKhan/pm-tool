<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamsController;
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

Route::get('/',[AuthController::class, 'login']);
Route::get('/dashboard',function(){
    return view("dashboard");
});

Route::resource('/projects',ProjectController::class);
Route::get('/projects/attachment/download/{file}',[ProjectController::class, 'download']);
Route::get('/projects/attachment/view/{file}',[ProjectController::class, 'view']);

Route::get('/auth/login',[AuthController::class, 'login']);
Route::get('/auth/registration',[AuthController::class, 'registration']);
Route::post('/auth/store',[AuthController::class, 'store']);
Route::post('/auth/check',[AuthController::class, 'check']);

Route::get('/tasks',[TaskController::class, 'index']);
Route::get('/tasks/create',[TaskController::class, 'create']);
Route::get('/users',function(){
    return view('users.index');
});


Route::get('/role',[RoleController::class, 'index']);
Route::get('/role/create',[RoleController::class, 'create']);
Route::post('/role/store',[RoleController::class, 'store']);
Route::get('/role/edit/{role}',[RoleController::class, 'edit']);
Route::post('/role/update/{role}',[RoleController::class, 'update']);
Route::get('/role/delete/{role}',[RoleController::class, 'destroy']);

Route::get('/user',[UserController::class, 'index']);
Route::get('/user/edit/{user}',[UserController::class, 'edit']);
Route::post('/user/update/{role}',[UserController::class, 'update']);
Route::get('/user/delete/{role}',[UserController::class, 'destroy']);


