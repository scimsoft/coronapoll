m<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSymptomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('symptoms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->string('ip')->nullable();
            $table->double('longitude')->nullable();
            $table->double('latitude')->nullable();
            $table->integer('location')->nullable();
            $table->bigInteger('temp');
            $table->integer('cough');
            $table->integer('musclePain');
            $table->integer('breathShortness');
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
        Schema::dropIfExists('symptoms');
    }
}
