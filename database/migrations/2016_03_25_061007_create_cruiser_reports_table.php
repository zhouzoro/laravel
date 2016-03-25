<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCruiserReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cruiser_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('author')->unsigned();
            $table->foreign('author')->references('id')->on('users');
            $table->integer('campus_vol')->unsigned();
            $table->foreign('campus_vol')->references('vol')->on('cruise_campus');
            $table->string('title');
            $table->string('feature');
            $table->string('tags');
            $table->string('cover');
            $table->string('quote');
            $table->mediumText('content');
            $table->integer('views_count');
            $table->integer('likes_count');
            $table->integer('comments_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cruiser_reports');
    }
}
