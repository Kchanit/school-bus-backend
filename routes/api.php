<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\RouteController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\UserController as ApiUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApiNotificationController;
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

Route::post('/register/validate', [AuthController::class, 'validateRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/users', [UserController::class, 'index']);
Route::put('/users/{id}/change-password', [ApiUserController::class, 'changePassword']); //
Route::put('/users/{id}', [UserController::class, 'updateFbToken']);

Route::post('/sendNotification/{student_id}/{title}/{body}', [ApiNotificationController::class, 'SendNotification']);

// Route::put('/users/{id}', [UserController::class, 'update']);
Route::get('/user', [UserController::class, 'show']);

// StudentAPI
Route::get('/students/{citizen_id}/my-students', [StudentController::class, 'myStudent']); // Select Student
Route::get('/students/{parentId}/get-my-students', [StudentController::class, 'getMyStudents']);
Route::post('/students/enroll', [StudentController::class, 'enrollStudent']);
Route::put('/students/{id}/change-bus-status', [StudentController::class, 'changeBusStatus']); //
Route::put('/students/{id}/update-status', [StudentController::class, 'updateStatus']); //

// RouteAPI
Route::get('/routes/{driverId}/get-my-route', [RouteController::class, 'getMyRoute']);
Route::get('/routes/{driverId}/get-route-address', [RouteController::class, 'getRouteAddress']);
// Route::post('/routes/update-order', [RouteController::class, 'updateOrder']); //
Route::put('/routes/update-order', [RouteController::class, 'updateOrder']);

Route::get('/get-parent-fbtoken', [StudentController::class, 'getParentFbtoken']);

// DriverAPI
Route::get('/drivers/{studentId}/get-driver', [DriverController::class, 'getDriver']);
Route::get('/drivers/{driver}/get-image', [DriverController::class, 'getImage']);
Route::put('/drivers/change-password', [DriverController::class, 'changePassword']); //

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