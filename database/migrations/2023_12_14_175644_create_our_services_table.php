<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_services', function (Blueprint $table) {
            $table->id()->unique();
            $table->unsignedBigInteger('service_id_1');
            $table->index('service_id_1');
            $table->foreign('service_id_1')->references('id')->on('services')->onDelete('cascade');
            $table->unsignedBigInteger('service_id_2');
            $table->index('service_id_2');
            $table->foreign('service_id_2')->references('id')->on('services')->onDelete('cascade');
            $table->unsignedBigInteger('service_id_3');
            $table->index('service_id_3');
            $table->foreign('service_id_3')->references('id')->on('services')->onDelete('cascade');
            $table->unsignedBigInteger('service_id_4');
            $table->index('service_id_4');
            $table->foreign('service_id_4')->references('id')->on('services')->onDelete('cascade');
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
        Schema::dropIfExists('our_services');
        Schema::table('our_services', function (Blueprint $table) {
            //
            $table->dropForeign('our_services_service_id_1_foreign');
            $table->dropIndex('our_services_service_id_1_index');
            $table->dropColumn('service_id_1');
            $table->dropForeign('our_services_service_id_2_foreign');
            $table->dropIndex('our_services_service_id_2_index');
            $table->dropColumn('service_id_2');
            $table->dropForeign('our_services_service_id_3_foreign');
            $table->dropIndex('our_services_service_id_3_index');
            $table->dropColumn('service_id_3');
            $table->dropForeign('our_services_service_id_4_foreign');
            $table->dropIndex('our_services_service_id_4_index');
            $table->dropColumn('service_id_4');
        });
    }
}
