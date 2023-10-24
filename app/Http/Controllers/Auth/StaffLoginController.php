<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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
            return view('staff.index', ['staff' => $staff]);
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
