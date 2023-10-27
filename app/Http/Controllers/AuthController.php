<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Staff;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // protected $userModel;



    public function register(Request $request)
    {
        // $type = $request->input('role');
        // if ($type == 'driver') {
        //     $this->userModel = Driver::class;
        // } else if ($type == 'staff') {
        //     $this->userModel = Staff::class;
        // } else
        //     $this->userModel = User::class;

        $request->validate([
            'email' => 'required|max:255',
            'password' => 'required',
        ]);

        if (User::where('email', $request->get('email'))->exists()) {
            return ['email' => 'Email already exists', 'success' => false];
        }
        if (Driver::where('email', $request->get('email'))->exists()) {
            return ['email' => 'Email already exists', 'success' => false];
        }
        if (User::where('citizen_id', $request->get('citizen_id'))->exists()) {
            return ['citizen_id' => 'Citizen ID already exists', 'success' => false];
        }


        $user = new User();
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->citizen_id = $request->get('citizen_id');
        $user->email = $request->get('email');
        $user->role = $request->get('role');
        $user->password = bcrypt($request->get('password')); // Hash the password
        $user->save();
        return ['message' => 'User created successfully', 'success' => true, 'user' => $user];
    }

    public function validateRegister(Request $request)
    {
        $request->validate([
            'email' => 'required|max:255',
            'password' => 'required',
            'citizen_id' => 'required',
        ]);

        $validationErrors = [];

        if (User::where('email', $request->get('email'))->exists()) {
            $validationErrors['email'] = 'Email already exists';
        }

        if (Driver::where('email', $request->get('email'))->exists()) {
            $validationErrors['email'] = 'Email already exists';
        }

        if (User::where('citizen_id', $request->get('citizen_id'))->exists()) {
            $validationErrors['citizen_id'] = 'Citizen ID already exists';
        }
        if (!Student::where('parent_citizen_id', $request->get('citizen_id'))->exists()) {
            $validationErrors['citizen_id'] = 'No Student found with this Citizen ID';
        }

        if (!empty($validationErrors)) {
            return response()->json([
                'success' => false,
                'errors' => $validationErrors,
            ]);
        }

        return ['message' => 'User created successfully', 'success' => true];
    }

    public function login(Request $request)
    {
        // $type = $request->input('role');
        // if ($type == 'driver') {
        //     $this->userModel = Driver::class;
        // } else if ($type == 'staff') {
        //     $this->userModel = Staff::class;
        // } else
        //     $this->userModel = User::class;

        // $user = $this->userModel::where('email', $request->get('email'))->first();
        $user = User::where('email', $request->get('email'))->first();
        if ($user === null) {
            $user = Driver::where('email', $request->get('email'))->first();
        }

        if ($user === null) {
            return response()->json([
                'success' => false,
                'message' => 'No account found with this email.',
            ], 500);
        }

        if ($user != '[]' && Hash::check($request->get('password'), $user->password)) {
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'user' => $user,
                'token' => $token,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials. Please check your email and password.',
            ], 500);
        }
    }
}
