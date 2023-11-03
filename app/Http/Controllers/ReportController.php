<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Route;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $routes = Route::with('driver')->paginate(10);
        return view('reports.index', ['routes' => $routes]);
    }

    public function show(Route $route)
    {
        return view('reports.show', ['route' => $route]);
    }
}
