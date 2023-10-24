<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $staff = new Staff();
        $staff->first_name = 'Admin';
        $staff->last_name = 'staff01';
        $staff->email = 'staff@gmail.com';
        $staff->password = bcrypt('1234');
        $staff->save();
    }
}
