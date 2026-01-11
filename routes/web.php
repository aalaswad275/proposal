<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StuProController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProjectController;

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    /*
    |--------------------------------------------------------------------------
    | Public Routes (Guest)
    |--------------------------------------------------------------------------
    */
    Route::get('/', [MainController::class, 'index'])->name('welcome');
    Route::get('/about', [MainController::class, 'about'])->name('about');
    Route::get('/contact', [MainController::class, 'contact'])->name('contact');
    Route::get('/search', [MainController::class, 'search'])->name('proposal.search');
    Route::get('/test', function () {
        return view('test');
    });

    /*
    |--------------------------------------------------------------------------
    | Authentication Routes
    |--------------------------------------------------------------------------
    */
    Auth::routes();

    /*
    |--------------------------------------------------------------------------
    | Authenticated Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth'])->group(function () {

        // Dashboard
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

        // Student pages
        Route::get('/students/task', [HomeController::class, 'index'])->name('student.tasks');
        Route::get('/students/projects', [HomeController::class, 'index'])->name('student.projects');
        Route::get('/students/printreport', [HomeController::class, 'index'])->name('student.printreport');

        // Resource Controllers (Protected)
        Route::resource('departments', DepartmentController::class);
        Route::resource('students', StudentController::class);
        Route::resource('stupros', StuProController::class);
        Route::resource('staff', StaffController::class);
        Route::resource('projects', ProjectController::class);

    });

});
