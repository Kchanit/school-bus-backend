<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->first_name = "Robert";
        $user->last_name = "Jackson";
        $user->email = "user01@gmail.com";
        $user->citizen_id = "1234567890111";
        $user->password = bcrypt('1234');
        $user->save();
    }
}
