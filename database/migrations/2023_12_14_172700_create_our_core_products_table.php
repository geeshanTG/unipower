<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurCoreProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_core_products', function (Blueprint $table) {
            $table->id()->unique();
            $table->unsignedBigInteger('main_category_id_1');
            $table->index('main_category_id_1');
            $table->foreign('main_category_id_1')->references('id')->on('main_categories')->onDelete('cascade');
            $table->unsignedBigInteger('main_category_id_2');
            $table->index('main_category_id_2');
            $table->foreign('main_category_id_2')->references('id')->on('main_categories')->onDelete('cascade');
            $table->unsignedBigInteger('main_category_id_3');
            $table->index('main_category_id_3');
            $table->foreign('main_category_id_3')->references('id')->on('main_categories')->onDelete('cascade');
            $table->unsignedBigInteger('main_category_id_4');
            $table->index('main_category_id_4');
            $table->foreign('main_category_id_4')->references('id')->on('main_categories')->onDelete('cascade');
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
        Schema::dropIfExists('our_core_products');
        Schema::table('our_core_products', function (Blueprint $table) {
            //
            $table->dropForeign('our_core_products_main_category_id_1_foreign');
            $table->dropIndex('our_core_products_main_category_id_1_index');
            $table->dropColumn('main_category_id_1');
            $table->dropForeign('our_core_products_main_category_id_2_foreign');
            $table->dropIndex('our_core_products_main_category_id_2_index');
            $table->dropColumn('main_category_id_2');
            $table->dropForeign('our_core_products_main_category_id_3_foreign');
            $table->dropIndex('our_core_products_main_category_id_3_index');
            $table->dropColumn('main_category_id_3');
            $table->dropForeign('our_core_products_main_category_id_4_foreign');
            $table->dropIndex('our_core_products_main_category_id_4_index');
            $table->dropColumn('main_category_id_4');
        });
    }
}
