<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Staff;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            DriverSeeder::class,
            StaffSeeder::class,
            UserSeeder::class,
            AddressSeeder::class,
            StudentSeeder::class,
            InitSeeder::class,
        ]);
    }
}
