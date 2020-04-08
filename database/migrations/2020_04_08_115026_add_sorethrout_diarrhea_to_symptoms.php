<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSorethroutDiarrheaToSymptoms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('symptoms', function (Blueprint $table) {
            //
            $table->integer('sorethroat')->nullable();
            $table->integer('diarrea')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('symptoms', function (Blueprint $table) {
            //
            $table->dropColumn('sorethroat')->nullable();
            $table->dropColumn('diarrea')->nullable();
        });
    }
}
