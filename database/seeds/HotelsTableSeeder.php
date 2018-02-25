<?php

use Illuminate\Database\Seeder;
use App\Hotel;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $hotel = Hotel::create([
        	'user_id' => '2',
            'hotelName' => 'Su Hnin Wai',
            'starRating' => '3',
            'street_number' => 'blah blash',
            'route' => 'blah',
            'locality' => 'blah',
            'state' => 'blah',
            'description' => 'yummy yummy',
            'noOfRoom' => '10',
            'phoneNumber' => '0123456789',
            'city' => 'Yangon',
            'country' => 'Myanmar',
        ]);
        $hotel->facility()->attach(1,['data' => false]);
        $hotel->facility()->attach(2,['data' => false]);
        $hotel->facility()->attach(3,['data' => false]);
        $hotel->facility()->attach(4,['data' => false]);
        $hotel->facility()->attach(5,['data' => false]);
        $hotel->facility()->attach(6,['data' => false]);
    }
}
