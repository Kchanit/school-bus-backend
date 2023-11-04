<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Driver;
use App\Models\Route;
use App\Models\Student;
use Illuminate\Http\Request;

class StaffLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->guard('staff')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $staff = auth()->guard('staff')->user();

            $drivers = Driver::with('route')->get();
            $students = Student::has('address')->get();
            $routes = Route::get();
            $avb_drivers = Driver::doesntHave('route')->get();
            $route_stds = Student::has('address')->doesntHave('route')->get();
            $all_students = Student::get();
            return view('staff.index', [
                'drivers' => $drivers,
                'students' => $students,
                'routes' => $routes,
                'avb_drivers' => $avb_drivers,
                'route_stds' => $route_stds,
                'all_students' => $all_students,
            ]);
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            'email' => 'These credentials do not match our records.'
        ]);
    }

    public function logout()
    {
        auth()->guard('staff')->logout();
        return redirect()->route('staff.login');
    }
}
