<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameToBookings extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasColumn('bookings', 'name')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->string('name')->after('BookingType')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        if (Schema::hasColumn('bookings', 'name')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->dropColumn('name');
            });
        }
    }
}