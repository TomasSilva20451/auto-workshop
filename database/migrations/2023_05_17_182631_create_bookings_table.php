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
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('BookingID');
            $table->unsignedInteger('VehicleID');
            $table->unsignedInteger('ClientID');
            $table->date('BookingDate');
            $table->string('BookingType');
            $table->string('Status');
            $table->date('CreationDate');
            $table->unsignedInteger('CustomerID');
            $table->timestamps();

            $table->foreign('VehicleID')->references('VehicleID')->on('vehicles');
            $table->foreign('ClientID')->references('ClientID')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
