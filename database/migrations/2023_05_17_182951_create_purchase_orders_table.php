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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->increments('PurchaseOrderID');
            $table->unsignedInteger('ServiceID');
            $table->unsignedInteger('BookingID');
            $table->string('ItemName');
            $table->decimal('ItemPrice', 8, 2);
            $table->date('CreationDate');
            $table->timestamps();

            $table->foreign('ServiceID')->references('ServiceID')->on('services');
            $table->foreign('BookingID')->references('BookingID')->on('bookings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('purchase_orders');
    }
};
