<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roomId')->unsigned();
            $table->integer('customerId')->unsigned();
            $table->integer('hotelId')->unsigned();
            $table->date('checkIn');
            $table->date('checkOut');
            $table->timestamps();
            $table->foreign('customerId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('roomId')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('hotelId')->references('id')->on('hotels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
