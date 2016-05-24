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
            //
            $table->dropColumn('campus_vol');
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
            //
            $table->integer('campus_vol')->unsigned();
        });
    }
}
