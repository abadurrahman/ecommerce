<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->integer('category_id')->nullable();
            $table->integer('subcategory_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_quantity')->nullable();
            $table->text('product_details')->nullable();
            $table->string('product_color')->nullable();
            $table->string('product_size')->nullable();
            $table->integer('selling_price')->nullable();
            $table->integer('discount_price')->nullable();
            $table->string('video_link')->nullable();
            $table->integer('newarrivals_one')->nullable();
            $table->integer('newarrivals_two')->nullable();
            $table->integer('newarrivals_three')->nullable();
            $table->integer('newarrivals_four')->nullable();
            $table->integer('newarrivals_five')->nullable();
            $table->integer('latest_design')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('collection')->nullable();
            $table->string('image_one')->nullable();
            $table->string('image_one_1')->nullable();
            $table->string('image_two')->nullable();
            $table->string('image_three')->nullable();
            $table->string('image_four')->nullable();
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
        Schema::dropIfExists('products');
    }
}
