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
        Schema::create('service_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_id');
            $table->string('service_type', 255);
            $table->date('date');
            $table->integer('duration');
            $table->decimal('cost', 10, 2);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('service_histories');
    }
};