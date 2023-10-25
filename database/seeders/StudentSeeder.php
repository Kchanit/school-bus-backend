<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = \Faker\Factory::create();

        $student = new Student();
        $student->first_name = 'Jimmy';
        $student->last_name = 'Carter';
        $student->parent_citizen_id = '1234567890123';
        // $student->address_id = 1;
        // $student->joined = true;
        $student->save();

        // $address = Address::find(1);
        // $address->student_id = 1;
        // $address->save();

        $student = new Student();
        $student->first_name = 'Jane';
        $student->last_name = 'Carter';
        $student->parent_citizen_id = '1234567890123';
        // $student->address_id = 1;
        // $student->joined = true;
        $student->save();

        // $address = Address::find(2);
        // $address->student_id = 2;
        // $address->save();



        for ($i = 1; $i <= 100; $i++) {
            $student = new Student();
            $student->first_name = $faker->firstName();
            $student->last_name = $faker->lastName();
            $student->parent_citizen_id = $faker->unique()->numerify('#############');
            $student->save();
        }

        // $student = new Student();
        // $student->first_name = 'John';
        // $student->last_name = 'Cena';
        // $student->parent_citizen_id = '1234567890124';
        // $student->save();

        // $student = new Student();
        // $student->first_name = 'Michael';
        // $student->last_name = 'Jackson';
        // $student->parent_citizen_id = '1234567890125';
        // $student->save();

        // $student = new Student();
        // $student->first_name = 'Snoop';
        // $student->last_name = 'Heehee';
        // $student->parent_citizen_id = '1234567890126';
        // $student->save();

        // Student::factory()
        //     ->count(100)
        //     ->create();


        // $i = 3;
        // while ($i <= Student::count()) {
        //     $student = Student::find($i);
        //     $student->address_id = $i - 1;
        //     $student->save();
        //     $i++;
        // }
    }
}
