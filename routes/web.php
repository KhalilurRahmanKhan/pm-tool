<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamsController;

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

