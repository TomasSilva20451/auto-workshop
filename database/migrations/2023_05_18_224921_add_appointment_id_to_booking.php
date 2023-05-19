<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAppointmentIdToBookings extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('appointment_id')->nullable();
            $table->foreign('appointment_id')->references('id')->on('appointments');
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['appointment_id']);
            $table->dropColumn('appointment_id');
        });
    }
}
