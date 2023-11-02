<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Route;
use App\Models\Staff;
use App\Models\Student;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::with('route')->get();
        $students = Student::has('address')->get();
        $routes = Route::get();
        $avb_drivers = Driver::doesntHave('route')->get();
        $route_stds = Student::has('address')->doesntHave('route')->get();
        $all_students = Student::get();
        return view('staff.index', [
            'drivers' => $drivers,
            'students' => $students,
            'routes' => $routes,
            'avb_drivers' => $avb_drivers,
            'route_stds' => $route_stds,
            'all_students' => $all_students,
        ]);
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
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
