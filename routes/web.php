<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

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

Route::get('/',[AuthController::class, 'login'])->name("login");
Route::get('/dashboard',function(){
    return view("dashboard");
})->middleware("auth");

Route::resource('/projects',ProjectController::class)->middleware("auth");
Route::get('/projects/attachment/download/{file}',[ProjectController::class, 'download'])->middleware("auth");
Route::get('/projects/attachment/view/{file}',[ProjectController::class, 'view'])->middleware("auth");

Route::get('/auth/login',[AuthController::class, 'login']);
Route::get('/auth/registration',[AuthController::class, 'registration']);
Route::post('/auth/logout',[AuthController::class, 'logout']);

Route::post('/auth/store',[AuthController::class, 'store']);
Route::post('/auth/check',[AuthController::class, 'check']);

Route::get('/tasks',[TaskController::class, 'index']);
Route::get('/tasks/create',[TaskController::class, 'create']);
Route::get('/users',function(){
    return view('users.index');
});


Route::get('/role',[RoleController::class, 'index'])->middleware("auth");
Route::get('/role/create',[RoleController::class, 'create'])->middleware("auth");
Route::post('/role/store',[RoleController::class, 'store']);
Route::get('/role/edit/{role}',[RoleController::class, 'edit'])->middleware("auth");
Route::post('/role/update/{role}',[RoleController::class, 'update']);
Route::delete('/role/delete/{role}',[RoleController::class, 'destroy'])->middleware("auth");
Route::post('/role/ax',[RoleController::class, 'ax']);

Route::get('/user',[UserController::class, 'index'])->middleware("auth");
Route::get('/user/edit/{user}',[UserController::class, 'edit'])->middleware("auth");
Route::post('/user/update/{user}',[UserController::class, 'update']);
Route::get('/user/block/{user}',[UserController::class, 'block'])->middleware("auth");
Route::get('/user/delete/{user}',[UserController::class, 'destroy'])->middleware("auth");



Route::get('dashboard/sweet',[DashboardController::class, 'sweet']);