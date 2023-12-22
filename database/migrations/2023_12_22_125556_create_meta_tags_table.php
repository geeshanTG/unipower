<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_tags', function (Blueprint $table) {
            $table->id();
            $table->string('page_name', 100);
            $table->string('page_title', 500)->nullable();
            $table->string('description', 500)->nullable();
            $table->string('keywords', 500)->nullable();
            $table->string('og_title', 500)->nullable();
            $table->string('og_type', 500)->nullable();
            $table->string('og_url', 500)->nullable();
            $table->string('og_image', 500)->nullable();
            $table->string('og_sitename', 500)->nullable();
            $table->string('og_description', 500)->nullable();
            $table->string('status', 1)->default('Y');
            $table->boolean('is_delete')->default(0);
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
        Schema::dropIfExists('meta_tags');
    }
}
