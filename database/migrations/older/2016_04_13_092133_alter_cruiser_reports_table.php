<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCruiserReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cruiser_reports', function (Blueprint $table) {
            $table->dropForeign('cruiser_reports_campus_vol_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cruiser_reports', function (Blueprint $table) {
            $table->foreign('campus_vol')->references('vol')->on('cruise_campus');
            //
        });
    }
}
