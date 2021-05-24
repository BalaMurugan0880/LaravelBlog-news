<?php

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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('mainModule_id')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('sub_title')->nullable();
            $table->text('details');
            $table->string('post_type')->nullable();
            $table->string('thumbnail_id')->nullable();//for xml get featured image only
            $table->enum('is_published', ['1', '0']);
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
