<?php

namespace Database\Seeders;

use App\Models\Address;
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
        for ($i = 2; $i <= 20; $i++) {
            $student = Student::inRandomOrder()->first();
            $student->address_id = $i;
            $student->joined = true;
            $student->save();

            $address = Address::find($i);
            $address->student_id = $student->id;
            $address->save();
        }
    }
}
