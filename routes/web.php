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
use App\Http\Controllers\UsersManagerController;
use App\Http\Controllers\ExportDataController;
use App\Http\Controllers\DepartmentController;
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

Route::group(['middleware' => ['auth', 'checkRole:superad', 'activated']], function () {
   // user management
    Route::get('user-management', [UsersManagerController::class, 'index'])->name('user-management.index');
    Route::post('user-management', [UsersManagerController::class, 'store'])->name('user-management.store');
    Route::get('user-management/{id}/edit', [UsersManagerController::class, 'edit'])->name('user-management.edit');
    Route::put('user-management/{id}', [UsersManagerController::class, 'update'])->name('user-management.update');
    Route::delete('user-management/{id}', [UsersManagerController::class, 'destroy'])->name('user-management.destroy');
    Route::get('get-user-details/{id}', [UsersManagerController::class, 'getUserDetails'])->name('user.details');

    // Route for registering users
    // Route::get('/register', function () {
    //     return view('dashboard');
    // });

});

Route::get('/export-data', [ExportDataController::class, 'export'])->name('export.data');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']) ->name('dashboard');

// Routes for rooms module
Route::resource('rooms', RoomsController::class);

// Routes for courses module
Route::resource('departments', DepartmentController::class);

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
Route::delete('/timetables/delete/{id}', [TImetablesController::class, 'delete']);

// User account activation routes
Route::get('/users/activate', [UsersController::class, 'showActivationPage']);
Route::post('/users/activate', [UsersController::class, 'activateUser']);

Route::middleware(['auth'])->group(function () {
    Route::get('/my_account', [UsersController::class, 'showAccountPage']);
    Route::post('/my_account', [UsersController::class, 'updateAccount']);
});


Auth::routes();
