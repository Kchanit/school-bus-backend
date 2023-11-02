<?php

use App\Http\Controllers\Api\RouteController;
use App\Http\Controllers\Api\StaffController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Auth\StaffLoginController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController as ControllersRouteController;
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

Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('delete/student/{id}', [StudentController::class, 'remove'])->name('student.remove');

Route::get('/', [StaffController::class, 'index'])->name('staff.index');
Route::post('/staff-login', [StaffLoginController::class, 'login'])->name('staff.login');
Route::post('/logout', [StaffLoginController::class, 'logout'])->name('staff.logout');



Route::get('/drivers/list', [DriverController::class, 'list'])->name('drivers.list');
Route::delete('drivers/{driver}', [DriverController::class, 'destroy'])->name('driver.destroy');
Route::get('edit/driver/{id}', [DriverController::class, 'edit'])->name('driver.edit');
Route::put('drivers/update/{id}', [DriverController::class, 'update'])->name('driver.update');
Route::resource('/drivers', DriverController::class);


// Route::get('/routes/add-student/{driver}', [RouteController::class, 'addStudent'])->name('routes.add-student');
// Route::get('/routes/create/{driver}', [RouteController::class, 'create'])->name('routes.create');
Route::post('/routes/create', [ControllersRouteController::class, 'create'])->name('routes.create');
Route::get('/routes/show/{driver}', [RouteController::class, 'show'])->name('routes.show');
Route::get('/routes/manage', [RouteController::class, 'manage'])->name('routes.manage');
Route::get('/routes/index', [ControllersRouteController::class, 'index'])->name('routes.index');
Route::post('routes/store', [RouteController::class, 'store'])->name('routes.store');
Route::post('routes/update', [RouteController::class, 'update'])->name('routes.update');
Route::get('routes/remove-student/{student}', [RouteController::class, 'removeStudent'])->name('routes.remove-student');
// Route::resource('/routes', RouteController::class);


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
