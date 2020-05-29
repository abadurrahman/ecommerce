<?php<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->nullable();
            $table->string('post_title_en')->nullable();
            $table->string('post_title_bn')->nullable();
            $table->string('post_title_cn')->nullable();
            $table->string('post_title_hn')->nullable();
            $table->string('post_image')->nullable();
            $table->text('details_en')->nullable();
            $table->text('details_bn')->nullable();
            $table->text('details_cn')->nullable();
            $table->text('details_hn')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
