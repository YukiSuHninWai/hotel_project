<?php

use Illuminate\Database\Seeder;
use App\Room;
class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		Room::create([
    			'hotel_id'	=> 1,
                'roomName' => '203',
    			'type'    => 1,
    			'description'    => "ohoh",
    			'price'	=> 500,
                'unit' => 'MMK',
    	]);
            Room::create([
                'hotel_id'  => 1,
                'roomName' => 'Cherry',
                'type'    => 1,
                'description'    => "ohoh",
                'price' => 500,
                'unit' => 'MMK',
        ]);
            Room::create([
                'hotel_id'  => 1,
                'roomName' => 'Sakura',
                'type'    => 1,
                'description'    => "ohoh",
                'price' => 500,
                'unit' => 'MMK',
        ]);
    }
}

