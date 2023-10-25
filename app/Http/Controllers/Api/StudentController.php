<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
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
        $student = new Student();
        $student->first_name = $request->get('first_name');
        $student->last_name = $request->get('last_name');
        $student->image_url = $request->get('image_url');
        $student->parent_id = $request->get('parent_id');
        $student->save();

        return response()->json([
            'message' => 'Student created successfully',
            'success' => true,
            'student' => $student
        ]);
    }

    public function enrollStudent(Request $request)
    {
        $address = Address::find($request->get('address_id'));
        $parent = User::find($request->get('parent_id'));

        $student = Student::find($request->get('student_id'));
        $student->parent_id = $request->get('parent_id');
        $student->address_id = $request->get('address_id');
        $student->joined = true;
        $student->save();

        $parent->students()->attach($student->id);
        $parent->save();
        $address->student_id = $request->get('student_id');
        $address->save();



        return response()->json([
            'message' => 'Student assigned successfully',
            'success' => true,
            'students' => $student
        ]);
    }

    /**
     * Display a list of students of a parent.
     */
    public function myStudent(Request $request)
    {
        $citizen_id = $request->get('citizen_id');
        $students = Student::where('parent_citizen_id', $citizen_id)->get();
        return response()->json([
            'success' => true,
            'students' => $students
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
