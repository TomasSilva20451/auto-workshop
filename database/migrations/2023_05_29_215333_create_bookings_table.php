<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->integer('BookingID')->primary();
            $table->integer('VehicleID');
            $table->integer('ClientID');
            $table->date('BookingDate');
            $table->string('BookingType');
            $table->string('Status');
            $table->date('CreationDate');
            $table->integer('CustomerID');
            $table->timestamps();
            $table->integer('appointment_id');
            $table->integer('vehicle_id');
            $table->integer('client_id');
            $table->date('booking_date');
            $table->string('booking_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}