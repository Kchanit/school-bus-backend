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


    public function show()
    {
        $user = auth()->user();
        return response()->json(['user' => $user], 200);
    }

    public function update(Request $request, $id)
    {
        // Logic to update an user record goes here
        $user = User::find($id);
        $user->update($request->all());
        $user->save();
        return response()->json(['message' => 'User data updated successfully', 'success' => true], 200);
    }

    public function destroy($id)
    {
        // Logic to delete a user by ID
    }
}
