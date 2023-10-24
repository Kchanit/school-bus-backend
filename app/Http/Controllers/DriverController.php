<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Nette\Utils\Random;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('drivers.index', ['drivers' => $drivers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $password = Random::generate(8);

        $driver = new Driver();
        $driver->first_name = $request->firstName;
        $driver->last_name = $request->lastName;
        $driver->email = $request->email;
        $driver->password = $password;
        $driver->save();

        return redirect()->route('drivers.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        //
    }
}
