<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Student;
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

        $faker = \Faker\Factory::create();

        // Mock Data
        $address = new Address();
        $address->home_address = '50 Chuchat Kamphu Alley, Khet Chatuchak, Krung Thep Maha Nakhon 10900';
        $address->home_latitude = 13.84765564295131;
        $address->home_longitude = 100.56982330977917;
        $address->district = 'Khet Chatuchak';
        $address->road = '50 Chuchat Kamphu Alley';
        $address->save();

        $address = new Address();
        $address->home_address = '2122 Phahonyothin Alley, Khet Chatuchak, Krung Thep Maha Nakhon 10900';
        $address->home_latitude = 13.837342576020363;
        $address->home_longitude = 100.5744494497776;
        $address->district = 'Khet Chatuchak';
        $address->road = '2122 Phahonyothin Alley';
        $address->save();

        $address = new Address();
        $address->home_address = '1408 Phahon Yothin Rd, Khet Chatuchak, Krung Thep Maha Nakhon 10900';
        $address->home_latitude = 13.820095163692946;
        $address->home_longitude = 100.56435965001583;
        $address->district = 'Khet Chatuchak';
        $address->road = '1408 Phahon Yothin Rd';
        $address->save();

        $address = new Address();
        $address->home_address = '1468 Phahon Yothin Rd, Khet Chatuchak, Krung Thep Maha Nakhon 10900';
        $address->home_latitude = 13.829574268935566;
        $address->home_longitude = 100.56979380548;
        $address->district = 'Khet Chatuchak';
        $address->road = '1468 Phahon Yothin Rd';
        $address->save();
        // End Mock Data

        // $address = new Address();
        // $address->home_address = '123/456 หมู่ 7 ตำบล ท่าข้าม อำเภอ สามพราน จังหวัด นครปฐม 10180';
        // $address->home_latitude = 13.805;
        // $address->home_longitude = 100.1;
        // $address->district = 'ท่าข้าม';
        // $address->road = 'ถนน สามพราน-นครปฐม';
        // $address->save();

        // $address = new Address();
        // $address->home_address = '123/456 หมู่ 7 ตำบล ท่าข้าม อำเภอ สามพราน จังหวัด นครปฐม 10180';
        // $address->home_latitude = 13.805;
        // $address->home_longitude = 100.1;
        // $address->district = 'ท่าข้าม';
        // $address->road = 'ถนน สามพราน-นครปฐม';
        // $address->save();


     

       
        // Address::factory()
        //     ->count(20)
        //     ->create();
    }
}
