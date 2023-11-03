<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Route;
use App\Models\StudentReport;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
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
        $date = new DateTime($request->input('date'));
        $start_time = new DateTime($request->input('start_time'));
        $end_time = new DateTime($request->input('end_time'));

        $route = Route::where('driver_id', $request->input('driver_id'))->first();
        $report = new Report();
        $report->driver_id = $request->input('driver_id');
        $report->date = $date->format('Y/m/d');
        $report->start_time = $start_time->format('H:i:s');
        $report->end_time = $end_time->format('H:i:s');
        $report->save();

        $students = $request->input('students');
        foreach ($students as $student) {
            $studentReport = new StudentReport();
            $studentReport->report_id = $report->id;
            $studentReport->student_id = $student['id'];
            $end_time = new DateTime($student['end_time']);
            $studentReport->end_time = $end_time->format('H:i:s');
            $studentReport->save();
            $report->studentReports()->save($studentReport);
        }

        return response()->json([
            'message' => 'Report created successfully',
            'report' => $report,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
