<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_stories', function (Blueprint $table) {
            $table->id()->unique();
            $table->unsignedBigInteger('top_story_news_1');
            $table->index('top_story_news_1');
            $table->foreign('top_story_news_1')->references('id')->on('news')->onDelete('cascade');
            $table->unsignedBigInteger('top_story_news_2');
            $table->index('top_story_news_2');
            $table->foreign('top_story_news_2')->references('id')->on('news')->onDelete('cascade');
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
        Schema::dropIfExists('top_stories');
        Schema::table('top_stories', function (Blueprint $table) {
            //
            $table->dropForeign('top_stories_top_story_news_1_foreign');
            $table->dropIndex('top_stories_top_story_news_1_index');
            $table->dropColumn('top_story_news_1');
            $table->dropForeign('top_stories_top_story_news_2_foreign');
            $table->dropIndex('top_stories_top_story_news_2_index');
            $table->dropColumn('top_story_news_2');
        });

    }
}
