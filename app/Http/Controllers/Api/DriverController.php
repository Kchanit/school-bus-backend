<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Student;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function getDriver(Request $request, $studentId)
    {
        $student = Student::find($studentId);
        $driver = $student->route->driver;
        $image_url = asset($driver->image_path);
        return response()->json([
            'success' => true,
            'driver' => array_merge($driver->toArray(), ['image_url' => $image_url])
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getImage(Driver $driver)
    {
        $driver = Driver::find($driver->id);
        $image_url = asset($driver->image_path);

        return response()->json([
            'success' => true,
            'image_url' => $image_url
        ]);
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
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
    }

    public function changePassword(Request $request)
    {
        $driver = Driver::find($request->get('driver_id'));
        $password = bcrypt($request->get('password'));
        if ($driver->password == $password) {
            $driver->password = bcrypt($request->get('new_password'));
            $driver->save();
            return response()->json([
                'message' => 'Password updated successfully',
                'success' => true,
                'driver' => $driver
            ]);
        } else {
            return response()->json([
                'message' => 'Password does not match',
                'success' => false,
                'driver' => $driver
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        //
    }
}
