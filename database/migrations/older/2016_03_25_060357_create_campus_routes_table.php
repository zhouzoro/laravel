<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus_routes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('croute_id')->unsigned();
            $table->foreign('croute_id')->references('id')->on('cruise_routes');
            $table->integer('campus_vol')->unsigned();
            $table->foreign('campus_vol')->references('vol')->on('cruise_campus');
            $table->integer('position');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campus_routes');
    }
}
