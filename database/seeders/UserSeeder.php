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
        $user->first_name = "Micky";
        $user->last_name = "Jackson";
        $user->email = "mj@gmail.com";
        $user->citizen_id = 110050161001;
        $user->password = bcrypt('1234');
        $user->save();

        $user = new User();
        $user->first_name = "Bobby";
        $user->last_name = "Haaland";
        $user->email = "bh@gmail.com";
        $user->citizen_id = 110050161002;
        $user->password = bcrypt('1234');
        $user->save();

        $user = new User();
        $user->first_name = "John";
        $user->last_name = "Carter";
        $user->email = "jc@gmail.com";
        $user->citizen_id = 110050161003;
        $user->password = bcrypt('1234');
        $user->save();

        $user = new User();
        $user->first_name = "Guitae";
        $user->last_name = "Nanthasen";
        $user->email = "gn@gmail.com";
        $user->citizen_id = 110050161004;
        $user->password = bcrypt('1234');
        $user->save();

        $user = new User();
        $user->first_name = "John";
        $user->last_name = "Cena";
        $user->email = "jcena@gmail.com";
        $user->citizen_id = "1234567890100";
        $user->password = bcrypt('1234');
        $user->save();

        $user = new User();
        $user->first_name = "Robert";
        $user->last_name = "Jackson";
        $user->email = "user01@gmail.com";
        $user->citizen_id = "1234567890111";
        $user->password = bcrypt('1234');
        $user->save();
    }
}
