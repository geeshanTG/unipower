<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id()->unique();
            $table->unsignedBigInteger('main_category_id');
            $table->index('main_category_id');
            $table->foreign('main_category_id')->references('id')->on('main_categories')->onDelete('cascade');
            $table->string('heading');
            $table->tinyInteger('order');
            $table->char('status', 0);
            $table->tinyInteger('is_delete')->default(0);
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
        Schema::dropIfExists('sub_categories');
        Schema::table('sub_categories', function (Blueprint $table) {
            //
            $table->dropForeign('sub_categories_main_category_id_foreign');
            $table->dropIndex('sub_categories_main_category_id_index');
            $table->dropColumn('main_category_id');
        });
    }
}
