<?php

use Illuminate\Database\Seeder;
use App\Notification;

class NotificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	Notification::create([
    		"user_id" => '1',
    		"content" => 'You are created at 12-01-2018.'
    	]);
    	Notification::create([
    		"user_id" => '1',
    		"content" => 'You are created at 12-01-2018.'
    	]);
    	Notification::create([
    		"user_id" => '1',
    		"content" => 'You are created at 12-01-2018.'
    	]);
        Notification::create([
            "user_id" => '1',
            "content" => 'You have changed your password.'
        ]);
    }
}
