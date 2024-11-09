<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('flight_id'); // clave foránea
            $table->unsignedBigInteger('passenger_id'); // clave foránea
            $table->timestampTz('reservation_date')->default(DB::raw('CURRENT_TIMESTAMP')); // fecha de reserva con zona horaria y valor predeterminado
            $table->string('status'); // equivalente a TEXT NOT NULL
            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('flight_id')->references('id')->on('flight');
            $table->foreign('passenger_id')->references('id')->on('passengers');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
