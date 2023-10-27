<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\RouteController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/users', [UserController::class, 'index']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::get('/user', [UserController::class, 'show']);

Route::post('/students/my-students', [StudentController::class, 'myStudent']);
Route::post('/students/get-my-students', [StudentController::class, 'getMyStudents']);
Route::post('/students/enroll', [StudentController::class, 'enrollStudent']);
Route::post('/students/change-bus-status', [StudentController::class, 'changeBusStatus']);
Route::post('/routes/get-my-route', [RouteController::class, 'getMyRoute']);
Route::apiResource('/students', StudentController::class);
Route::apiResource('/addresses', AddressController::class);
Route::middleware('auth:api')->group(function () {
});
// Route::get('/users', 'UserController@index');
// Route::post('/users', 'UserController@store');
// Route::get('/users/{id}', 'UserController@show');
// Route::put('/users/{id}', 'UserController@update');
// Route::delete('/users/{id}', 'UserController@destroy');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });