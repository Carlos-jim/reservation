<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengersTable extends Migration
{
    public function up()
    {
        Schema::create('passengers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name'); // equivalente a TEXT NOT NULL
            $table->string('last_name'); // equivalente a TEXT NOT NULL
            $table->string('email')->unique(); // equivalente a TEXT UNIQUE
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('passengers');
    }
}
