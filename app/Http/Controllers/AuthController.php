<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required',
        ]);

        if (User::where('email', $request->get('email'))->exists()) {
            return ['message' => 'User already exists', 'success' => false];
        }

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password')); // Hash the password
        $user->save();
        return ['message' => 'User created successfully', 'success' => true, 'user' => $user];
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();
            if ($user instanceof \App\Models\User) {
                $token = $user->createToken('authToken')->plainTextToken;
            }
            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'user' => $user,
                'token' => $token,
            ], 200);
        }

        return [
            'success' => false,
            'message' => 'Invalid credentials. Please check your email and password.',
        ];
    }
}
