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
        Schema::create('part_orders', function (Blueprint $table) {
            $table->increments('PartOrderID');
            $table->unsignedInteger('BookingID');
            $table->unsignedInteger('PartID');
            $table->integer('Quantity');
            $table->date('CreationDate');
            $table->unsignedInteger('PurchaseOrderID');
            $table->unsignedInteger('ServiceID');
            $table->timestamps();

            $table->foreign('BookingID')->references('BookingID')->on('bookings');
            $table->foreign('PartID')->references('PartID')->on('parts');
            $table->foreign('PurchaseOrderID')->references('PurchaseOrderID')->on('purchase_orders');
            $table->foreign('ServiceID')->references('ServiceID')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('part_orders');
    }
};
