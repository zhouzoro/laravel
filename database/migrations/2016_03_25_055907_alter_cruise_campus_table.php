<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCruiseCampusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cruise_campus', function (Blueprint $table) {
            $table->integer('vol')->unsigned();
            $table->primary('vol');
            $table->timestamps();
            $table->integer('agenda_id')->unsigned();
            $table->foreign('agenda_id')->references('id')->on('agenda');
            $table->mediumText('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cruise_campus', function (Blueprint $table) {
            //
        });
    }
}
