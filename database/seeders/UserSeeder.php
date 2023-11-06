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
        $user->email = "parent@gmail.com";
        $user->citizen_id = 110050161001;
        $user->fbtoken = 'daxDobn3QS-7hC-9Ac5vkc:APA91bHWMIs_5EvDJBwfaee5x0c6SFpSn74zqFSxGJbRSrigOJroKykyQJblCTdwKeVuxs1KtS2eSwAH9PCkoN-ixZiK3p-wrJVRO8wV2vlNfNR_6oiaYcMhaAAliYhZffH05i02QEiS';
        $user->password = bcrypt('1234');
        $user->save();

        $user = new User();
        $user->first_name = "Bobby";
        $user->last_name = "Haaland";
        $user->email = "bh@gmail.com";
        $user->citizen_id = 110050161002;
        $user->fbtoken = 'e4cFaHevQDKD3znVghehUI:APA91bFtQW6p0VpGIO3EGj9B8BXhmFCdCRaaa_xt5HOK9XyN_emCcXmQeudRCRhWEvxA8RnE0ry2P_I0O0lC00_Tfax89tlj9EB9KU6S5b-iPP9jS4gfwzJLnLLQY57BkjwH0N9gH3lE';
        $user->password = bcrypt('1234');
        $user->save();

        $user = new User();
        $user->first_name = "John";
        $user->last_name = "Carter";
        $user->email = "jc@gmail.com";
        $user->citizen_id = 110050161003;
        $user->fbtoken = 'e4cFaHevQDKD3znVghehUI:APA91bFtQW6p0VpGIO3EGj9B8BXhmFCdCRaaa_xt5HOK9XyN_emCcXmQeudRCRhWEvxA8RnE0ry2P_I0O0lC00_Tfax89tlj9EB9KU6S5b-iPP9jS4gfwzJLnLLQY57BkjwH0N9gH3lE';
        $user->password = bcrypt('1234');
        $user->save();

        $user = new User();
        $user->first_name = "Guitae";
        $user->last_name = "Nanthasen";
        $user->email = "gn@gmail.com";
        $user->citizen_id = 110050161004;
        $user->fbtoken = 'e4cFaHevQDKD3znVghehUI:APA91bFtQW6p0VpGIO3EGj9B8BXhmFCdCRaaa_xt5HOK9XyN_emCcXmQeudRCRhWEvxA8RnE0ry2P_I0O0lC00_Tfax89tlj9EB9KU6S5b-iPP9jS4gfwzJLnLLQY57BkjwH0N9gH3lE';
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
