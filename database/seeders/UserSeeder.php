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
        $user->name = 'user01';
        $user->email = "user01@gmail.com";
        $user->password = bcrypt('1234');
        $user->role = 'PARENT';
        $user->address = 'Jl. Raya Bogor, Cibinong, Bogor, Jawa Barat, Indonesia';
        $user->home_latitude = -6.481710;
        $user->home_longitude = 106.854370;
        $user->save();
    }
}
