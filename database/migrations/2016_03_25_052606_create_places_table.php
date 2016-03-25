<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name_zh');
            $table->string('name_en');//en should be upper case;
            $table->string('country_zh');
            $table->string('country_en');//en should be upper case;
            //longitude and latitude
            $table->double('lon',15,12);
            $table->double('lat',15,12);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('places');
    }
}
