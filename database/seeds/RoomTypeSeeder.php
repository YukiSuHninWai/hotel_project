<?php

use Illuminate\Database\Seeder;
use App\RoomType;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        RoomType::create([
        	'type' => 'Single'
        ]);
        RoomType::create([
        	'type' => 'Double'
        ]);
        RoomType::create([
        	'type' => 'Dulux'
        ]);
    }
}
