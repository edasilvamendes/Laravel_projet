<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->enum('post_type', ['formation', 'stage'])->default('formation'); 
            $table->string('title', 100);
            $table->longText('description')->nullable();

            $table->dateTime('begin_date')->nullable();
            $table->dateTime('end_date')->nullable();

            $table->unsignedDecimal('price', 6, 2)->nullable();
            $table->unsignedDecimal('max_students')->nullable();

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
