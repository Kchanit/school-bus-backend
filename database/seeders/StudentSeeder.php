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

        // Start Demo
        $student = new Student();
        $student->first_name = "Michael";
        $student->last_name = "Jackson";
        $student->parent_citizen_id = 110050161001;
        $student->parent_id = 1;
        $student->joined = true;
        $student->save();

        $address = Address::find(1);
        $address->student_id = 1;
        $address->save();

        $student = new Student();
        $student->first_name = "Erling";
        $student->last_name = "Haaland";
        $student->parent_citizen_id = 110050161002;
        $student->parent_id = 2;
        $student->joined = true;
        $student->save();

        $address = Address::find(2);
        $address->student_id = 2;
        $address->save();

        $student = new Student();
        $student->first_name = "Jimmy";
        $student->last_name = "Carter";
        $student->parent_citizen_id = 110050161003;
        $student->parent_id = 3;
        $student->joined = true;
        $student->save();

        $address = Address::find(3);
        $address->student_id = 3;
        $address->save();

        $student = new Student();
        $student->first_name = "Narun";
        $student->last_name = "Nanthasen";
        $student->parent_citizen_id = 110050161004;
        $student->parent_id = 4;
        $student->joined = true;
        $student->save();

        $address = Address::find(4);
        $address->student_id = 4;
        $address->save();
        // End of Demo

        // Present
        $student = new Student();
        $student->first_name = 'Alice';
        $student->last_name = 'Chancharoen';
        $student->parent_citizen_id = '1234567890123';
        $student->save();

        $student = new Student();
        $student->first_name = 'Bob';
        $student->last_name = 'Chancharoen';
        $student->parent_citizen_id = '1234567890123';
        $student->save();
        // End of Present


        // for ($i = 1; $i <= 100; $i++) {
        //     $student = new Student();
        //     $student->first_name = $faker->firstName();
        //     $student->last_name = $faker->lastName();
        //     $student->parent_citizen_id = $faker->unique()->numerify('#############');
        //     $student->save();
        // }
    }
}
