<?php

use App\Http\Controllers\Api\StaffController;
use App\Http\Controllers\Auth\StaffLoginController;
use App\Http\Controllers\ProfileController;
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
    return view('staff.showLoginForm');
});

// Staff Login Routes
Route::get('/login', [StaffLoginController::class, 'showLoginForm'])->name('staff.showLoginForm');
Route::post('/staff-login', [StaffLoginController::class, 'login'])->name('staff.login');
Route::post('/logout', [StaffLoginController::class, 'logout'])->name('staff.logout');



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
