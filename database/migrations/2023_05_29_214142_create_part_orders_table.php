<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_orders', function (Blueprint $table) {
            $table->integer('PartOrderID')->primary();
            $table->integer('BookingID');
            $table->integer('PartID');
            $table->integer('Quantity');
            $table->date('CreationDate');
            $table->integer('PurchaseOrderID');
            $table->integer('ServiceID');
            $table->integer('part_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('part_orders');
    }
}