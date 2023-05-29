<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ServiceID');
            $table->unsignedBigInteger('BookingID');
            $table->string('ItemName');
            $table->decimal('ItemPrice', 10, 2);
            $table->timestamps();

           /*  $table->foreign('ServiceID')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('BookingID')->references('id')->on('bookings')->onDelete('cascade'); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_orders');
    }
}