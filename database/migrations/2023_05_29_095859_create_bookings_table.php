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
            $table->integer('BookingID');
            $table->integer('VehicleID');
            $table->integer('ClientID');
            $table->date('BookingDate');
            $table->string('BookingType', 255);
            $table->string('Status', 255);
            $table->date('CreationDate');
            $table->integer('CustomerID');
            $table->timestamps();
            $table->integer('appointment_id');
            $table->integer('vehicle_id');
            $table->integer('client_id');
            $table->date('booking_date');
            $table->string('booking_type', 255);
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