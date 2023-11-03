<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Report;
use App\Models\Route;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::with('studentReports')->paginate(10);
        return view('reports.index', ['reports' => $reports]);
    }


    public function show(Report $report)
    {
        $studentReports = $report->studentReports;
        $start_time = new DateTime($report->start_time);
        $end_time = new DateTime($report->end_time);
        $interval = $start_time->diff($end_time);
        $totalTimeMinutes = $interval->h * 60 + $interval->i;  // Total minutes
        return view('reports.show', ['report' => $report, 'studentReports' => $studentReports, 'totalTime' => $totalTimeMinutes]);
    }
}
