<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
    }

    public function changePassword(Request $request, $id)
    {
        // Find the user by ID
        $user = User::find($id);

        // Verify the old password
        if (Hash::check($request->get('password'), $user->password)) {
            // Hash and update the new password
            $user->password = bcrypt($request->get('new_password'));
            $user->save();

            return response()->json([
                'message' => 'Password updated successfully',
                'success' => true,
                'user' => $user
            ]);
        } else {
            return response()->json([
                'message' => 'Password does not match',
                'success' => false,
                'user' => $user,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
