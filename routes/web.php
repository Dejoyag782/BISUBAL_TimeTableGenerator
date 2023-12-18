<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\TimeslotsController;
use App\Http\Controllers\ProfessorsController;
use App\Http\Controllers\CollegeClassesController;
use App\Http\Controllers\TimetablesController;
use App\Http\Controllers\UsersController;
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

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']) ->name('dashboard');

// Routes for rooms module
Route::resource('rooms', RoomsController::class);

// Routes for courses module
Route::resource('courses', CoursesController::class);

// Routes for timeslots module
Route::resource('timeslots', TimeslotsController::class);

// Routes for professors module
Route::resource('professors', ProfessorsController::class);

// Routes for college classes
Route::resource('classes', CollegeClassesController::class);

// Routes for timetable generation
Route::post('timetables', [TimetablesController::class, 'store']);
Route::get('timetables', [TImetablesController::class, 'index']);
Route::get('timetables/view/{id}', [TImetablesController::class, 'view']);

// User account activation routes
Route::get('/users/activate', [UsersController::class, 'showActivationPage']);
Route::post('/users/activate', [UsersController::class, 'activateUser']);

Route::get('/my_account', [UsersController::class, 'showAccountPage']);
Route::post('/my_account', [UsersController::class, 'updateAccount']);

Route::get('/dashboard/index', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Auth::routes();
