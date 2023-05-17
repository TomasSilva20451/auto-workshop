<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsTable extends Migration
{
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2)->default(0);
            $table->string('location');
            $table->integer('quantity');
            $table->boolean('availability')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parts');
    }
}