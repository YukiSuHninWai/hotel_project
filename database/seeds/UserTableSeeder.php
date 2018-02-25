<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	\DB::table("users")->insert([
    		'name'  => 'Super Admin',
    		'email' => 'super@gmail.com',
    		'password' => \Hash::make('123456'),
            'role' => 'super',
    		]);   
        \DB::table("users")->insert([
            'name' => 'Hotel Admin',
            'email' => 'hotel@gmail.com',
            'password' => \Hash::make('1234567'),
            'role' => 'admin'
            ]);
    }
}
