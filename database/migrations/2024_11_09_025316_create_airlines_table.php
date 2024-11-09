<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirlinesTable extends Migration
{
    public function up()
    {
        Schema::create('airlines', function (Blueprint $table) {
            $table->bigIncrements('id'); // equivale a BIGINT PRIMARY KEY
            $table->string('name'); // equivale a TEXT NOT NULL
            $table->string('code')->unique(); // equivale a TEXT NOT NULL UNIQUE
            $table->timestamps(); // crea columnas 'created_at' y 'updated_at' automáticamente
        });
    }

    public function down()
    {
        Schema::dropIfExists('airlines');
    }
}
