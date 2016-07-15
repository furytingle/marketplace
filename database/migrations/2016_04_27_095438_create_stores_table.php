<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->integer('userId')->unique()->unsigned();
            $table->string('link', 25)->nullable();
            $table->string('brandName', 50)->nullable();
            $table->string('contactData', 150)->nullable();
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
            $table->string('poster')->nullable();
            $table->integer('countryId')->unsigned()->nullable();
            $table->integer('cityId')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('stores', function ($table) {
            $table->foreign('userId')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
            $table->dropForeign(['userId']);
        });

        Schema::drop('stores');
    }
}
