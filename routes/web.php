<?php

use App\Http\Controllers\Api\StaffController;
use App\Http\Controllers\Auth\StaffLoginController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     // if (auth()->guard('staff')->check()) {
//     //     return redirect()->route('staff.index');
//     // }
//     return view('staff.index');
// });

// Staff Login Routes
// Route::get('/login', [StaffLoginController::class, 'showLoginForm'])->name('staff.showLoginForm');

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::post('/students/{student}', [StudentController::class, 'remove'])->name('student.remove');
Route::post('/students/{student}', [StudentController::class, 'reset'])->name('student.reset');

Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/{report}', [ReportController::class, 'show'])->name('reports.show');


Route::get('/', [StaffController::class, 'index'])->name('staff.index');
Route::post('/staff-login', [StaffLoginController::class, 'login'])->name('staff.login');
Route::post('/logout', [StaffLoginController::class, 'logout'])->name('staff.logout');


Route::get('/drivers/list', [DriverController::class, 'list'])->name('drivers.list');
Route::get('/drivers/confirm/{driver}', [DriverController::class, 'confirm'])->name('drivers.confirm');
Route::delete('drivers/{driver}', [DriverController::class, 'destroy'])->name('driver.destroy');
Route::get('edit/driver/{id}', [DriverController::class, 'edit'])->name('driver.edit');
Route::put('drivers/update/{id}', [DriverController::class, 'update'])->name('driver.update');
Route::resource('/drivers', DriverController::class);


Route::get('routes/{route}/{driver}/add-student', [RouteController::class, 'addStudent'])->name('routes.add-student');
Route::get('/routes/create', [RouteController::class, 'create'])->name('routes.create');
Route::get('/routes/show/{driver}', [RouteController::class, 'show'])->name('routes.show');
Route::get('/routes/manage', [RouteController::class, 'manage'])->name('routes.manage');
Route::get('/routes/index', [RouteController::class, 'index'])->name('routes.index');
Route::post('/routes/store', [RouteController::class, 'store'])->name('routes.store');
Route::put('/routes/update', [RouteController::class, 'update'])->name('routes.update');
Route::put('/routes/{route}/update-student/{driver}', [RouteController::class, 'updateStudent'])->name('routes.update-student');
Route::get('routes/remove-student/{student}', [RouteController::class, 'removeStudent'])->name('routes.remove-student');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/home', [StaffController::class, 'index'])->name('staff.index');
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
