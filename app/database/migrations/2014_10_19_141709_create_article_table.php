<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('user_id');

            $table->string('title', 64);
            $table->string('subtitle', 64)->default('');
            $table->string('thumbnail', 256)->default('');

            $table->integer('category_id');

            $table->text('abstract')->default('');
            $table->text('content');
            

            $table->string('status', 16)->default('draft');
            $table->dateTime('published_at');

            $table->integer('topic_id');

            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('article');
    }

}
