<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Route;
use App\Models\Student;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $routes = Route::all();
        $drivers = Driver::all();
        $students = Student::has('address')->get();

        return view('routes.index', ['drivers' => $drivers, 'students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Driver $driver)
    {
        $students = Student::has('address')->get();
        return view('routes.create', ['driver' => $driver, 'students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $driver_id = $request->get('driver_id');
        $students_id = $request->get('students_id');

        // Create a new route
        $route = new Route();
        $route->driver_id = $driver_id;
        $route->save();

        // Associate students with the route
        foreach ($students_id as $index => $student_id) {
            $student = Student::find($student_id);

            // Set the route_id on the student
            $student->route_id = $route->id;
            $student->order = $index + 1;
            $student->save();
        }

        // Redirect to the route's show page
        return response()->json([
            'message' => 'Route created successfully',
            'route' => $route,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        $students = Student::has('address')->get();
        return view('routes.show', ['driver' => $driver, 'students' => $students]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Route $route)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Route $route)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route $route)
    {
        //
    }
}
