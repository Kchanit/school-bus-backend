<?php

namespace Database\Seeders;

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
        $student = new Student();
        $student->first_name = 'Jimmy';
        $student->last_name = 'Carter';
        $student->parent_citizen_id = '1234567890123';
        $student->save();

        $student = new Student();
        $student->first_name = 'Jane';
        $student->last_name = 'Carter';
        $student->parent_citizen_id = '1234567890123';
        $student->save();

        $student = new Student();
        $student->first_name = 'John';
        $student->last_name = 'Cena';
        $student->parent_citizen_id = '1234567890124';
        $student->save();

        $student = new Student();
        $student->first_name = 'Michael';
        $student->last_name = 'Jackson';
        $student->parent_citizen_id = '1234567890125';
        $student->save();

        $student = new Student();
        $student->first_name = 'Snoop';
        $student->last_name = 'Heehee';
        $student->parent_citizen_id = '1234567890126';
        $student->save();


        Student::factory()
            ->count(10)
            ->create();
    }
}
