<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFloorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('floors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        Schema::table('stores', function ($table) {
            $table->integer('floorID')->nullable()->unsigned();

            $table->foreign('floorID')
                ->references('id')
                ->on('floors');
        });

        Schema::table('categories', function ($table) {
            $table->integer('floorID')->unsigned();

            $table->foreign('floorID')
                ->references('id')
                ->on('floors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function ($table) {
            $table->dropForeign(['floorID']);
        });

        Schema::table('categories', function ($table) {
            $table->dropForeign(['floorID']);
        });

        Schema::drop('floors');
    }
}
