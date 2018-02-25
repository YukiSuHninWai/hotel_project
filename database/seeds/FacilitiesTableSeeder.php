<?php

use Illuminate\Database\Seeder;
use App\Facility;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Facility::create([
            'facility' => 'Bar'                      
        ]);
        Facility::create([
            'facility' => 'Bath Tub'                      
        ]);
        Facility::create([
            'facility' => 'Car'                      
        ]);
        Facility::create([
            'facility' => 'TV'                      
        ]);
        Facility::create([
            'facility' => 'Refrigerator'                      
        ]);
        Facility::create([
            'facility' => 'Aircon'                      
        ]);
    }
}
