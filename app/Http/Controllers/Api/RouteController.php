<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Driver;
use App\Models\Route;
use App\Models\Student;
use Illuminate\Http\Request;
use PDO;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $routes = Route::with('driver')->get();
    //     $drivers = Driver::with('route')->paginate(7);
    //     return view('routes.index', ['routes' => $routes, 'drivers' => $drivers]);
    //     // return view('routes.index', ['drivers' => $drivers]);
    // }

    public function manage()
    {
        $drivers = Driver::with('route')->paginate(6);
        return view('routes.manage', ['drivers' => $drivers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $students = Student::has('address')->doesntHave('route')->get();
    //     return view('routes.create', ['students' => $students]);
    // }

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
    }


    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        // $route = Route::where('driver_id', $driver->id)->first();
        // if (!$route) {
        //     return redirect()->route('routes.create', ['driver' => $driver]);
        // }
        // $students = $route->students;
        // return view('routes.show', ['route' => $route, 'driver' => $driver, 'students' => $students]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Driver $driver)
    {
    }

    public function getMyRoute(Request $request, $driverId)
    {
        $driver = Driver::find($driverId);
        $route = Route::where('driver_id', $driver->id)->first();
        $students = $route->students;
        $studentsWithAddress = [];
        foreach ($students as $student) {
            $studentData = $student->toArray();
            $studentData['home_address'] = $student->address->home_address;
            $studentData['home_latitude'] = $student->address->home_latitude;
            $studentData['home_longitude'] = $student->address->home_longitude;
            $studentsWithAddress[] = $studentData;
        };
        return response()->json([
            'success' => true,
            'students' => $studentsWithAddress,
        ]);
    }
    // public function getMyRoute(Request $request)
    // {
    //     $driver_id = $request->get('driver_id');
    //     $driver = Driver::find($driver_id);
    //     $route = Route::where('driver_id', $driver->id)->first();
    //     $students = $route->students;
    //     return response()->json([
    //         'success' => true,
    //         'students' => $students
    //     ]);
    // }

    public function updateOrder(Request $request)
    {
        $students = $request->get('students');
        foreach ($students as $index => $student) {
            $student = Student::find($student['id']);
            $student->order = $index + 1;
            $student->save();
        }

        // $updatedStudents = Student::whereIn('id', array_column($students, 'id'))->get();

        return response()->json([
            'success' => true,
            'message' => 'Order updated successfully',
            // 'students' => $updatedStudents
        ]);
    }

    public function getRouteAddress(Request $request, $driverId)
    {
        // $driver_id = $request->get('driver_id');
        $driver = Driver::find($driverId);
        $route = Route::where('driver_id', $driver->id)->first();
        $students = $route->students->sortBy('order');
        $addresses = [];
        foreach ($students as $student) {
            $addresses[] = $student->address;
        }
        return response()->json([
            'success' => true,
            'addresses' => $addresses
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Driver $driver)
    // {
    //     $driver_id = $request->input('driver_id');
    //     $driver = Driver::find($driver_id);
    //     $route = Route::where('driver_id', $driver->id)->first();
    //     $students_id = $request->input('students_id');
    //     $students_id_array = explode(',', $students_id);
    //     $students = [];

    //     // Associate students with the route
    //     foreach ($students_id_array as $index => $student_id) {
    //         $student = Student::find($student_id);
    //         $students[] = $student;
    //         $student->order = $index + 1;
    //         $student->save();
    //     }

    //     // Redirect to the route's show page
    //     return redirect()->route('routes.show', ['route' => $route, 'driver' => $driver, 'students' => $students]);
    // }

   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route $route)
    {
        //
    }
}
