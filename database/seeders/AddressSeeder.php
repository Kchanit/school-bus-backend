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

        $address = new Address();
        $address->home_address = '123/456 หมู่ 7 ตำบล ท่าข้าม อำเภอ สามพราน จังหวัด นครปฐม 10180';
        $address->home_latitude = 13.805;
        $address->home_longitude = 100.1;
        $address->district = 'ท่าข้าม';
        $address->road = 'ถนน สามพราน-นครปฐม';
        $address->save();

        $address = new Address();
        $address->home_address = '123/456 หมู่ 7 ตำบล ท่าข้าม อำเภอ สามพราน จังหวัด นครปฐม 10180';
        $address->home_latitude = 13.805;
        $address->home_longitude = 100.1;
        $address->district = 'ท่าข้าม';
        $address->road = 'ถนน สามพราน-นครปฐม';
        $address->save();


        $route2 = [
            [
                'home_address' => '123 Sukhumvit Road, Sukhumvit',
                'home_latitude' => 13.7243,
                'home_longitude' => 100.5651,
                'district' => 'Sukhumvit',
                'road' => 'Sukhumvit Road',
            ],
            [
                'home_address' => '456 Sukhumvit Road, Sukhumvit',
                'home_latitude' => 13.7250,
                'home_longitude' => 100.5667,
                'district' => 'Sukhumvit',
                'road' => 'Sukhumvit Road',
            ],
            [
                'home_address' => '789 Sukhumvit Road, Sukhumvit',
                'home_latitude' => 13.7262,
                'home_longitude' => 100.5685,
                'district' => 'Sukhumvit',
                'road' => 'Sukhumvit Road',
            ],
            [
                'home_address' => '1010 Sukhumvit Road, Sukhumvit',
                'home_latitude' => 13.7275,
                'home_longitude' => 100.5700,
                'district' => 'Sukhumvit',
                'road' => 'Sukhumvit Road',
            ],
            [
                'home_address' => '1313 Sukhumvit Road, Sukhumvit',
                'home_latitude' => 13.7290,
                'home_longitude' => 100.5720,
                'district' => 'Sukhumvit',
                'road' => 'Sukhumvit Road',
            ],
        ];

        for ($i = 0; $i < count($route2); $i++) {
            $student = new Student();
            $student->first_name = $faker->firstName();
            $student->last_name = $faker->lastName();
            $student->parent_citizen_id = $faker->unique()->numerify('#############');
            $student->joined = true;
            $student->order = $i + 1;

            $address = new Address();
            $address->home_address = $route2[$i]['home_address'];
            $address->home_latitude = $route2[$i]['home_latitude'];
            $address->home_longitude = $route2[$i]['home_longitude'];
            $address->district = $route2[$i]['district'];
            $address->road = $route2[$i]['road'];
            $address->save();

            $student->address_id = $address->id;
            $student->save();
        }

        $route3 = [
            [
                'home_address' => '123 Phahon Yothin Road, Phahon Yothin',
                'home_latitude' => 13.8463,
                'home_longitude' => 100.5645,
                'district' => 'Phahon Yothin',
                'road' => 'Phahon Yothin Road',
            ],
            [
                'home_address' => '456 Phahon Yothin Road, Phahon Yothin',
                'home_latitude' => 13.8480,
                'home_longitude' => 100.5672,
                'district' => 'Phahon Yothin',
                'road' => 'Phahon Yothin Road',
            ],
            [
                'home_address' => '789 Phahon Yothin Road, Phahon Yothin',
                'home_latitude' => 13.8512,
                'home_longitude' => 100.5711,
                'district' => 'Phahon Yothin',
                'road' => 'Phahon Yothin Road',
            ],
            [
                'home_address' => '1010 Phahon Yothin Road, Phahon Yothin',
                'home_latitude' => 13.8535,
                'home_longitude' => 100.5740,
                'district' => 'Phahon Yothin',
                'road' => 'Phahon Yothin Road',
            ],
            [
                'home_address' => '1313 Phahon Yothin Road, Phahon Yothin',
                'home_latitude' => 13.8560,
                'home_longitude' => 100.5775,
                'district' => 'Phahon Yothin',
                'road' => 'Phahon Yothin Road',
            ],
            [
                'home_address' => '1616 Phahon Yothin Road, Phahon Yothin',
                'home_latitude' => 13.8585,
                'home_longitude' => 100.5810,
                'district' => 'Phahon Yothin',
                'road' => 'Phahon Yothin Road',
            ],
            [
                'home_address' => '1919 Phahon Yothin Road, Phahon Yothin',
                'home_latitude' => 13.8610,
                'home_longitude' => 100.5845,
                'district' => 'Phahon Yothin',
                'road' => 'Phahon Yothin Road',
            ],
        ];

        $route4 = [
            [
                'home_address' => '123 Lad Prao Road, Lad Prao',
                'home_latitude' => 13.8193,
                'home_longitude' => 100.5680,
                'district' => 'Lad Prao',
                'road' => 'Lad Prao Road',
            ],
            [
                'home_address' => '456 Lad Prao Road, Lad Prao',
                'home_latitude' => 13.8230,
                'home_longitude' => 100.5720,
                'district' => 'Lad Prao',
                'road' => 'Lad Prao Road',
            ],
            [
                'home_address' => '789 Lad Prao Road, Lad Prao',
                'home_latitude' => 13.8260,
                'home_longitude' => 100.5755,
                'district' => 'Lad Prao',
                'road' => 'Lad Prao Road',
            ],
            [
                'home_address' => '1010 Lad Prao Road, Lad Prao',
                'home_latitude' => 13.8300,
                'home_longitude' => 100.5795,
                'district' => 'Lad Prao',
                'road' => 'Lad Prao Road',
            ],
            [
                'home_address' => '1313 Lad Prao Road, Lad Prao',
                'home_latitude' => 13.8340,
                'home_longitude' => 100.5830,
                'district' => 'Lad Prao',
                'road' => 'Lad Prao Road',
            ],
            [
                'home_address' => '1616 Lad Prao Road, Lad Prao',
                'home_latitude' => 13.8380,
                'home_longitude' => 100.5870,
                'district' => 'Lad Prao',
                'road' => 'Lad Prao Road',
            ],
        ];

        // Address::factory()
        //     ->count(20)
        //     ->create();
    }
}
