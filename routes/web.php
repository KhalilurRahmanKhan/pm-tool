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

Route::get('/',function (){
  return view ("home");
})->name("login");
Route::get('/dashboard',[DashboardController::class, 'index'])->middleware("auth");

Route::resource('/projects',ProjectController::class)->middleware(["auth","check"]);
Route::get('/projects/attachment/download/{file}',[ProjectController::class, 'download'])->middleware(["auth","check"]);
Route::get('/projects/attachment/view/{file}',[ProjectController::class, 'view'])->middleware(["auth","check"]);

Route::get('/auth/login',[AuthController::class, 'login']);
Route::get('/auth/registration',[AuthController::class, 'registration']);
Route::post('/auth/logout',[AuthController::class, 'logout']);
Route::post('/auth/change/password',[AuthController::class, 'changePassword']);
Route::get('/auth/change/password',function (){
  return view('auth.changePassword');
});

Route::post('/auth/store',[AuthController::class, 'store']);
Route::post('/auth/check',[AuthController::class, 'check']);

Route::resource('/tasks',TaskController::class)->middleware(["auth","check"]);
Route::get('tasks/create/{id}',[TaskController::class, 'create']);
Route::get('/tasks/attachment/view/{file}',[TaskController::class, 'view'])->middleware(["auth","check"]);
Route::post('tasks/status/update/{id}',[TaskController::class,'statusUpdate']);






Route::get('/users',function(){
    return view('users.index');
});


Route::get('/role',[RoleController::class, 'index'])->middleware(["auth","check"]);
Route::get('/role/create',[RoleController::class, 'create'])->middleware(["auth","check"]);
Route::post('/role/store',[RoleController::class, 'store']);
Route::get('/role/edit/{role}',[RoleController::class, 'edit'])->middleware(["auth","check"]);
Route::post('/role/update/{role}',[RoleController::class, 'update']);
Route::delete('/role/delete/{role}',[RoleController::class, 'destroy'])->middleware(["auth","check"]);
// Route::post('/role/ax',[RoleController::class, 'ax']);
// Route::get('/role/print',[RoleController::class, 'print']);["auth","check"]

Route::get('/user',[UserController::class, 'index'])->middleware(["auth","check"]);
Route::get('/user/edit/{user}',[UserController::class, 'edit'])->middleware(["auth","check"]);
Route::post('/user/update/{user}',[UserController::class, 'update']);
Route::get('/user/block/{user}',[UserController::class, 'block'])->middleware(["auth","check"]);
Route::delete('/user/delete/{user}',[UserController::class, 'destroy'])->middleware(["auth","check"]);



Route::get('test',function (){
  return  view ("test");
});