<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredictionsTable extends Migration
{
    public function up()
    {
        Schema::create('predictions', function (Blueprint $table) {
            $table->id();
            $table->float('MinTemp');
            $table->float('MaxTemp');
            $table->float('WindSpeed9am');
            $table->float('WindSpeed3pm');
            $table->float('Humidity9am');
            $table->float('Humidity3pm');
            $table->boolean('RainToday');
            $table->boolean('RainTomorrow');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('predictions');
    }
}