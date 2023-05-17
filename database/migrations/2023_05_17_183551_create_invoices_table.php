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
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('InvoiceID');
            $table->unsignedInteger('BookingID');
            $table->decimal('TotalPrice', 8, 2);
            $table->date('CreationDate');
            $table->unsignedInteger('PartOrderID')->nullable();
            $table->unsignedInteger('ServiceID')->nullable();
            $table->timestamps();

            $table->foreign('BookingID')->references('BookingID')->on('bookings');
            $table->foreign('PartOrderID')->references('PartOrderID')->on('part_orders');
            $table->foreign('ServiceID')->references('ServiceID')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};