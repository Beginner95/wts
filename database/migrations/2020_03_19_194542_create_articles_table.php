<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->string('title');
            $table->string('slug');
            $table->string('main_cover')->nullable();
            $table->string('detail_cover')->nullable();
            $table->string('img_alt')->nullable();
            $table->string('img_title')->nullable();
            $table->bigInteger('post_category_id');
            $table->integer('claps');
            $table->text('short_desc')->nullable();
            $table->longText('body');
            $table->char('is_published')->default('0');
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
        Schema::dropIfExists('articles');
    }
}
