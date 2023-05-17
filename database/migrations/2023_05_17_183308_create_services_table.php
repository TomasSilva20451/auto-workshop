<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('ServiceID');
            $table->string('Name');
            $table->unsignedInteger('BookingID');
            $table->unsignedInteger('VehicleID');
            $table->timestamps();

            $table->foreign('BookingID')->references('BookingID')->on('bookings');
            $table->foreign('VehicleID')->references('VehicleID')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
};
