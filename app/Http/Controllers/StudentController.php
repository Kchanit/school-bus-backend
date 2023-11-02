<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::has('address')->sortable()->paginate(10);
        return view('student.index', ['students' => $students]);
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
    public function show(Student $student)
    {
        //
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

    public function reset(Student $student)
    {
        // $student->parent_id = null;
        $student->address_id = null;
        $student->route_id = null;
        $student->order = null;
        $student->joined = 0;
        $student->save();
        return redirect()->route('students.index');
    }

    public function remove(Student $student)
    {
        $student = Student::find($student->id);
        $student->joined = false;
        $student->save();
        return redirect()->route('students.index');
    }
}
