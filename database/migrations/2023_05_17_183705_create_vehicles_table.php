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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('VehicleID');
            $table->string('Make');
            $table->string('Model');
            $table->integer('Year');
            $table->date('CreationDate');
            $table->string('Status');
            $table->unsignedInteger('ClientID');

            $table->foreign('ClientID')->references('ClientID')->on('clients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
