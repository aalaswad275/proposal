<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Department;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StuProController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProjectController;
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
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin');
});

Route::resource('departments', DepartmentController::class);
Route::resource('students', StudentController::class);
Route::resource('stupros', StuProController::class);
Route::resource('staff', StaffController::class);
Route::resource('projects', ProjectController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
