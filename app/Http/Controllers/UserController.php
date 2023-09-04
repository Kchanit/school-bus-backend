<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Logic to get all users goes here
        $users = User::all();
        return response()->json(['users' => $users], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password'); // Hash the password
        // 'password' => bcrypt($data['password']), // Hash the password

        return response()->json(['message' => 'User created successfully'], 201);
    }


    public function show($id)
    {
        // Logic to retrieve a specific user by ID
    }

    public function update(Request $request, $id)
    {
        // Logic to update a user by ID
    }

    public function destroy($id)
    {
        // Logic to delete a user by ID
    }
}
