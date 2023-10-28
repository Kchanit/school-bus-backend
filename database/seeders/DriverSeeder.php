<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $driver = new Driver();
        $driver->first_name = 'John';
        $driver->last_name = 'Doe';
        $driver->email = 'johnny@gmail.com';
        $driver->password = bcrypt('1234');
        $driver->image_path = 'images/drivers/driver1.jpg';
        $driver->save();

        Driver::factory()->count(10)->create();
    }
}
