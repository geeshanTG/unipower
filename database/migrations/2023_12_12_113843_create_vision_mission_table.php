<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisionMissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vision_mission', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('vision_heading');
            $table->string('mission_heading');
            $table->longText('vision_description');
            $table->longText('mission_description');
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
        Schema::dropIfExists('vision_mission');
    }
}
