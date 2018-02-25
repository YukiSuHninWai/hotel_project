2<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(FacilitiesTableSeeder::class);
        $this->call(HotelsTableSeeder::class);
        $this->call(NotificationTableSeeder::class);
        $this->call(RoomTypeSeeder::class);         
        $this->call(RoomsTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
    }
}
