<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('items', function (Blueprint $table) {

            
            $table->integer('category_id')->unsigned(); 
            $table->increments('id');
            $table->string('title');
            $table->string('alias');
            $table->text('description');            
            $table->integer('country_id');
            $table->integer('region_id')->nullable();
            $table->tinyInteger('ispricable')->nullable();
            $table->float('price')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();            
            $table->text('address3')->nullable();
            $table->string('zipcode')->nullable(); 
            $table->string('phone')->nullable();
            $table->string('tags')->nullable();           
            $table->tinyinteger('views');
            $table->integer('published');
            $table->integer('user_id')->unsigned(); 
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::drop('items');
    }
}
