<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublishArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publish_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('author_name');
            $table->string('article_title');
            $table->text('article_body');
            $table->string('category');
            $table->unsignedInteger('author_id'); 
            $table->foreign('author_id')->references('id')->on('author_table'); 
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
        Schema::dropIfExists('publish_articles');
    }
}
