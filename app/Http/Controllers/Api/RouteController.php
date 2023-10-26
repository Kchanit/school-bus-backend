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
        $routes = Route::all();
        $drivers = Driver::with('route')->paginate(6);
        return view('routes.index', ['routes' => $routes, 'drivers' => $drivers]);
        // return view('routes.index', ['drivers' => $drivers]);
    }

    public function manage()
    {
        $drivers = Driver::with('route')->paginate(6);
        return view('routes.manage', ['drivers' => $drivers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Driver $driver)
    {
        $students = Student::has('address')->doesntHave('route')->get();
        $driver = Driver::find($driver->id);
        return view('routes.create', ['driver' => $driver, 'students' => $students]);
    }

    public function addStudent(Driver $driver)
    {
        $students = Student::has('address')->doesntHave('route')->get();
        $driver = Driver::find($driver->id);
        return view('routes.add', ['driver' => $driver, 'students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Driver $driver)
    {
        $students_id = $request->input('students_id');
        $students_id_array = explode(',', $students_id);
        $students = [];
        $driver_id = $request->input('driver_id');
        $driver = Driver::find($driver_id);
        // If $driver is not provided, create a new route
        if (!$driver->route) {
            // Create a new route
            $route = new Route();
            $route->driver_id = $driver_id;
            $route->save();
        } else {
            $route = $driver->route; // Retrieve the driver's route
            $lastStudent = $route->students()->latest('order')->first();
        }
        $order = $lastStudent ? $lastStudent->order + 1 : 1;

        // Associate students with the route
        foreach ($students_id_array as $student_id) {
            $student = Student::find($student_id);
            $students[] = $student;

            // Set the route_id on the student
            $student->route_id = $route->id;
            $student->order = $order;
            $student->save();
            $order++;
        }

        // Redirect to the route's show page
        return view('routes.show', ['route' => $route, 'driver' => $driver, 'students' => $route->students]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        $route = Route::where('driver_id', $driver->id)->first();
        if (!$route) {
            return redirect()->route('routes.create', ['driver' => $driver]);
        }
        $students = $route->students;
        return view('routes.show', ['route' => $route, 'driver' => $driver, 'students' => $students]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Driver $driver)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        $driver_id = $request->input('driver_id');
        $driver = Driver::find($driver_id);
        $route = Route::where('driver_id', $driver->id)->first();
        $students_id = $request->input('students_id');
        $students_id_array = explode(',', $students_id);
        $students = [];

        // Associate students with the route
        foreach ($students_id_array as $index => $student_id) {
            $student = Student::find($student_id);
            $students[] = $student;
            $student->order = $index + 1;
            $student->save();
        }

        // Redirect to the route's show page
        return redirect()->route('routes.show', ['route' => $route, 'driver' => $driver, 'students' => $students]);
    }

    public function removeStudent(Student $student)
    {
        $student->route_id = null;
        $student->order = null;
        $student->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route $route)
    {
        //
    }
}
