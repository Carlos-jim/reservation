<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatsTable extends Migration
{
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('flight_id'); // clave foránea
            $table->string('seat_number'); // equivalente a TEXT NOT NULL
            $table->boolean('is_available')->default(true); // equivalente a BOOLEAN con valor predeterminado true
            $table->timestamps();

            // Definir la clave foránea
            $table->foreign('flight_id')->references('id')->on('flight');
        });
    }

    public function down()
    {
        Schema::dropIfExists('seats');
    }
}
