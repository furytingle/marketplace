<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userID')->unsigned();
            $table->integer('type')->unsigned(); // 1 - product, 2 - service
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->timestamp('created_at');
        });

        Schema::table('products', function ($table) {
            $table->foreign('userID')
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
        Schema::table('products', function ($table) {
            $table->dropForeign(['userID']);
        });

        Schema::drop('products');
    }
}
