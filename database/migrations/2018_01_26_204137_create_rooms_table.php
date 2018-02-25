<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id')->unsigned();
            $table->string('roomName');
            $table->integer('type')->unsigned();
            $table->string('description');
            $table->integer('price');
            $table->string('unit');
            $table->timestamps();
            $table->foreign('type')->references('id')->on('room_types');//null
            $table->foreign('hotel_id')->references('id')->on("hotels")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
