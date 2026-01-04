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

// routes/web.php

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/



	Route::get('test',function(){
		return View::make('test');
	});
    Route::get('/', function () {
    return view('welcome');
})->name('welcome');
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
Route::get('/students/task', [App\Http\Controllers\HomeController::class, 'index'])->name('student.tasks');
Route::get('/students/projects', [App\Http\Controllers\HomeController::class, 'index'])->name('student.projects');
Route::get('/students/printreport', [App\Http\Controllers\HomeController::class, 'index'])->name('student.printreport');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');

});

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/


