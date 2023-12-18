<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndustryInsightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industry_insights', function (Blueprint $table) {
            $table->id()->unique();
            $table->unsignedBigInteger('news_id_1');
            $table->index('news_id_1');
            $table->foreign('news_id_1')->references('id')->on('news')->onDelete('cascade');
            $table->unsignedBigInteger('news_id_2');
            $table->index('news_id_2');
            $table->foreign('news_id_2')->references('id')->on('news')->onDelete('cascade');
            $table->unsignedBigInteger('news_id_3');
            $table->index('news_id_3');
            $table->foreign('news_id_3')->references('id')->on('news')->onDelete('cascade');
            $table->unsignedBigInteger('news_id_4');
            $table->index('news_id_4');
            $table->foreign('news_id_4')->references('id')->on('news')->onDelete('cascade');
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
        Schema::dropIfExists('industry_insights');
        Schema::table('industry_insights', function (Blueprint $table) {
            //
            $table->dropForeign('news_news_id_1_foreign');
            $table->dropIndex('news_news_id_1_index');
            $table->dropColumn('news_id_1');
            $table->dropForeign('news_news_id_2_foreign');
            $table->dropIndex('news_news_id_2_index');
            $table->dropColumn('news_id_2');
            $table->dropForeign('news_news_id_3_foreign');
            $table->dropIndex('news_news_id_3_index');
            $table->dropColumn('news_id_3');
            $table->dropForeign('news_news_id_4_foreign');
            $table->dropIndex('news_news_id_4_index');
            $table->dropColumn('news_id_4');
        });
    }
}
