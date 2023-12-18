<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturedNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('featured_news', function (Blueprint $table) {
            $table->id()->unique();
            $table->unsignedBigInteger('featured_news_1');
            $table->index('featured_news_1');
            $table->foreign('featured_news_1')->references('id')->on('news')->onDelete('cascade');
            $table->unsignedBigInteger('featured_news_2');
            $table->index('featured_news_2');
            $table->foreign('featured_news_2')->references('id')->on('news')->onDelete('cascade');
            $table->unsignedBigInteger('featured_news_3');
            $table->index('featured_news_3');
            $table->foreign('featured_news_3')->references('id')->on('news')->onDelete('cascade');
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
        Schema::dropIfExists('featured_news');
        Schema::table('featured_news', function (Blueprint $table) {
            //
            $table->dropForeign('featured_news_featured_news_1_foreign');
            $table->dropIndex('featured_news_featured_news_1_index');
            $table->dropColumn('featured_news_news_1');
            $table->dropForeign('featured_news_featured_news_2_foreign');
            $table->dropIndex('featured_news_featured_news_2_index');
            $table->dropColumn('featured_news_news_2');
            $table->dropForeign('featured_news_featured_news_3_foreign');
            $table->dropIndex('featured_news_featured_news_3_index');
            $table->dropColumn('featured_news_news_3');
        });
    }
}
