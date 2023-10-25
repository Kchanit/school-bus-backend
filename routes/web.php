<?php

use App\Http\Controllers\Api\RouteController;
use App\Http\Controllers\Api\StaffController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Auth\StaffLoginController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    if (auth()->guard('staff')->check()) {
        return redirect()->route('staff.index');
    }
    return view('auth.login');
});

// Staff Login Routes
// Route::get('/login', [StaffLoginController::class, 'showLoginForm'])->name('staff.showLoginForm');

Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('delete/{id}', [StudentController::class, 'remove'])->name('student.remove');

Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
Route::post('/staff-login', [StaffLoginController::class, 'login'])->name('staff.login');
Route::post('/logout', [StaffLoginController::class, 'logout'])->name('staff.logout');

Route::resource('/routes', RouteController::class);


Route::resource('/drivers', DriverController::class);
Route::get('/routes/create/{driver}', [RouteController::class, 'create'])->name('routes.create');
Route::get('/routes/show/{driver}', [RouteController::class, 'show'])->name('routes.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/home', [StaffController::class, 'index'])->name('staff.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
