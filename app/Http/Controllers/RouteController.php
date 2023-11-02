<?php

namespace App\Http\Controllers;

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
        $routes = Route::with('driver')->paginate(6);
        return view('routes.index', ['routes' => $routes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::has('address')->doesntHave('route')->get();
        $drivers = Driver::get();
        return view('routes.create', ['students' => $students, 'drivers' => $drivers]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,  $driverId)
    {
        dd($request->all(), $driverId);
        $driver = Driver::find($driverId);
        $students_id = $request->input('students_id');
        $students_id_array = explode(',', $students_id);
        $students = [];
        $driver_id = $request->input('driver_id');
        $driver = Driver::find($driver_id);

        $lastStudent = null;
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

    public function updateStudent(Request $request,  $driver)
    {
        $driver = Driver::find($driver);
        $route = Route::where('driver_id', $driver->id)->first();
        $students_id = $request->input('students_id');
        $students_id_array = explode(',', $students_id);
        $students = [];
        $lastStudent = $route->students()->latest('order')->first();
        $order = $lastStudent ? $lastStudent->order + 1 : 1;
        foreach ($students_id_array as $student_id) {
            $student = Student::find($student_id);
            $students[] = $student;

            // Set the route_id on the student
            $student->route_id = $route->id;
            $student->order = $order;
            $student->save();
            $order++;
        }
        return view('routes.show', ['route' => $route, 'driver' => $driver, 'students' => $route->students]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Route $route, Driver $driver)
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
    public function edit(Route $route)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Route $route, Driver $driver)
    {
        $driver_id = $request->input('driver_id');
        $driver = Driver::find($driver_id);
        $students_id = $request->input('students_id');
        $students_id_array = explode(',', $students_id);
        $students = [];

        foreach ($students_id_array as $index => $student_id) {
            $student = Student::find($student_id);
            $students[] = $student;
            $student->order = $index + 1;
            $student->save();
        }
        return redirect()->route('routes.show', ['route' => $route, 'driver' => $driver, 'students' => $students]);
    }



    public function addStudent(Route $route, Driver $driver)
    {
        $students = Student::has('address')->doesntHave('route')->get();
        return view('routes.add-student', ['route' => $route, 'driver' => $driver, 'students' => $students]);
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
