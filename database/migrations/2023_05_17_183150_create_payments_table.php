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
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('PaymentID');
            $table->unsignedInteger('BookingID');
            $table->string('PaymentType');
            $table->decimal('PaymentAmount', 8, 2);
            $table->date('CreationDate');
            $table->unsignedInteger('PurchaseOrderID');
            $table->timestamps();

            $table->foreign('BookingID')->references('BookingID')->on('bookings');
            $table->foreign('PurchaseOrderID')->references('PurchaseOrderID')->on('purchase_orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
