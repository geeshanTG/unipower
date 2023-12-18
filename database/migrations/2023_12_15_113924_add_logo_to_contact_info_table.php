<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLogoToContactInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_info', function (Blueprint $table) {
            //
            $table->string('fax')->after('phone_number_2');
            $table->string('twitter_url')->after('email');
            $table->string('linkedin_url')->after('email');
            $table->string('facebook_url')->after('email');
            $table->string('logo')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_info', function (Blueprint $table) {
            $table->dropColumn('fax');
            $table->dropColumn('twitter_url');
            $table->dropColumn('linkedin_url');
            $table->dropColumn('facebook_url');
            $table->dropColumn('logo');
        });
    }
}
