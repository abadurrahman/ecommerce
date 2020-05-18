<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('main_slider_one')->nullable();
            $table->integer('main_slider_two')->nullable();
            $table->integer('mens_slider_one')->nullable();
            $table->integer('mens_slider_two')->nullable();
            $table->integer('womens_slider_one')->nullable();
            $table->integer('womens_slider_two')->nullable();
            $table->integer('electronics_slider')->nullable();
            $table->integer('blog_slider')->nullable();
            $table->integer('contact_slider')->nullable();
            $table->string('image_one')->nullable(); 
            $table->string('image_two')->nullable(); 
            $table->string('image_three')->nullable();      
            $table->integer('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
