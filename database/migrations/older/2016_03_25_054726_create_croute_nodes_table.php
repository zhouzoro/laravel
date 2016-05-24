<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrouteNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('croute_nodes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('croute_id')->unsigned();
            $table->foreign('croute_id')->references('id')->on('cruise_routes');
            $table->integer('place_id')->unsigned();
            $table->foreign('place_id')->references('id')->on('places');
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
        Schema::drop('croute_nodes');
    }
}
