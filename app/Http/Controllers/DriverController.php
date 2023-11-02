<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Student;
use Illuminate\Http\Request;
use Nette\Utils\Random;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::with('route')->paginate(6);
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
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|unique:drivers,email',
        ]);
        $password = Random::generate(8);

        $driver = new Driver();
        $driver->first_name = $request->firstName;
        $driver->last_name = $request->lastName;
        $driver->email = $request->email;
        $driver->password = $password;
        // if ($request->hasFile('image_url')) {
        //     $path = $request->file('image_url')->store('images/drivers', 'public');
        // } else {
        //     $path = "images/drivers/default.jpg";
        // }
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = $driver->firstName . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/drivers'), $imageName);
            $imageURL = 'images/drivers/' . $imageName;
        } else {
            $imageURL = 'images/drivers/default.jpg';
        }

        $driver->image_path = $imageURL;
        $driver->save();

        return redirect()->route('drivers.index');
    }

    public function list()
    {
        $drivers = Driver::with('route')->sortable()->paginate(10);
        return view('drivers.list', ['drivers' => $drivers]);
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
    public function edit($id)
    {
        $driver = Driver::find($id);
        return view('drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
        ]);

        $driver->first_name = $request->get('firstName');
        $driver->last_name = $request->get('lastName');
        $driver->save();

        return redirect()->route('drivers.list');
    }

    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('drivers.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function remove($id)
    {
        $driver = Driver::find($id);
        $driver->delete();
        return back();
    }
}
