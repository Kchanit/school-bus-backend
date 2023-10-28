<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Driver;
use App\Models\Route;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 7; $i <= 20; $i++) {
            $student = Student::where('id', '>', 6)->inRandomOrder()->first();
            $student->address_id = $i;
            $student->joined = true;
            $student->save();

            $address = Address::find($i);
            $address->student_id = $student->id;
            $address->save();
        }

        $route = new Route();
        $route->driver_id = 1;
        $route->save();
        $student = Student::find(1);

        $student->route_id = $route->id;
        $student->order = 1;
        $student->save();

        $student = Student::find(2);
        $student->route_id = $route->id;
        $student->order = 2;
        $student->save();

        // Demo Route
        for ($i = 1; $i <= 4; $i++) {
            $student = Student::find($i);
            $student->route_id = 1;
            $student->address_id = $i;
            $student->order = $i;
            $student->save();
        }

        // for ($i = 1; $i <= 5; $i++) {
        //     $student = Student::where('id', '>', 6)->where('joined', true)->inRandomOrder()->first();
        //     $student->route_id = $route->id;
        //     $student->order = $i + 2;
        //     $student->save();
        // }
    }
}
