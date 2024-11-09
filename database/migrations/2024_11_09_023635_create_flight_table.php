<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    public function up()
    {
        Schema::create('flight', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('airline_id'); // clave foránea
            $table->string('flight_number'); // equivalente a TEXT NOT NULL
            $table->string('departure_airport'); // equivalente a TEXT NOT NULL
            $table->string('arrival_airport'); // equivalente a TEXT NOT NULL
            $table->timestampTz('departure_time'); // TIMESTAMP WITH TIME ZONE
            $table->timestampTz('arrival_time'); // TIMESTAMP WITH TIME ZONE
            $table->timestamps();

            // Definir la clave foránea
            $table->foreign('airline_id')->references('id')->on('airlines');
        });
    }

    public function down()
    {
        Schema::dropIfExists('flight');
    }
}

