<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiddleBannerContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('middle_banner_contents', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('count_1');
            $table->string('heading_1');
            $table->string('count_2');
            $table->string('heading_2');
            $table->string('count_3');
            $table->string('heading_3');
            $table->string('count_4');
            $table->string('heading_4');
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
        Schema::dropIfExists('middle_banner_contents');
    }
}
