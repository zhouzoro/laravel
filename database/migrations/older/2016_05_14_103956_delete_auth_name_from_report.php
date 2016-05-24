<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteAuthNameFromReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cruiser_reports', function (Blueprint $table) {
            $table->dropForeign(['author_name']);
            $table->dropColumn('author_name');
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
        });
    }
}
