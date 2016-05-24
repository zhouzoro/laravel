<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('has_routes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('croute_id')->unsigned();
            $table->foreign('croute_id')->references('id')->on('cruise_routes');
            $table->integer('cruise_id')->unsigned();
            $table->foreign('cruise_id')->references('id')->on('cruise');
            //estimated start date 
            $table->date('est_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('has_routes');
    }
}
