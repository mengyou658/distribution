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

            $table->integer('answer_count')->default(0);
            $table->string('status', 16)->default('published');

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
        Schema::drop('question');
    }

}
