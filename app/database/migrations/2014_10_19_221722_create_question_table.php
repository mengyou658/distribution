<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('user_id');

            $table->string('title', 64);
            $table->text('content');
            $table->text('markdown');

            $table->integer('answer_count')->default(0);
            $table->string('status', 16)->default('published');

            $table->integer('topic_id');
            $table->integer('digg_count')->default(0);

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
        Schema::drop('question');
    }

}
