<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    
    public $table = 'properties';
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('productId');
            $table->string('name', 50);
            $table->string('value', 255);
        });

        Schema::table($this->table, function ($table) {
            $table->foreign('productId')
                ->references('id')
                ->on('products')
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
        Schema::table($this->table, function ($table) {
            $table->dropForeign(['productId']);
        });

        Schema::drop($this->table);
    }
}
