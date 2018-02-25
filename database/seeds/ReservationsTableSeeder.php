<?php

use Illuminate\Database\Seeder;
use App\Reservation;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Reservation::create([
            'roomId' => '1',
            'hotelId' => '1',
        	'customerId' => '1',
        	'checkIn' =>'2018-01-06',
        	'checkOut' => '2018-01-07',
        ]);
        Reservation::create([
            'roomId' => '2',
            'hotelId' => '1',
            'customerId' => '2',
            'checkIn' =>'2018-01-06',
            'checkOut' => '2018-01-07',
        ]);
        Reservation::create([
            'roomId' => '3',
            'hotelId' => '1',
            'customerId' => '1',
            'checkIn' =>'2018-01-06',
            'checkOut' => '2018-01-07',
        ]);
    }
}
