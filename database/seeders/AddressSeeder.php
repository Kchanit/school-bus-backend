<?php

namespace Database\Seeders;

use App\Models\Address;
use Database\Factories\AddressFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $address = new Address();
        $address->home_address = '123/456 หมู่ 7 ตำบล ท่าข้าม อำเภอ สามพราน จังหวัด นครปฐม 10180';
        $address->home_latitude = 13.805;
        $address->home_longitude = 100.1;
        $address->district = 'ท่าข้าม';
        $address->road = 'ถนน สามพราน-นครปฐม';
        $address->save();

        Address::factory()
            ->count(20)
            ->create();
    }
}
