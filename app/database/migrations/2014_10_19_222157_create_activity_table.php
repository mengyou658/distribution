<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('title', 64);

            $table->text('abstract');
            $table->text('content');

            $table->dateTime('began_at');
            $table->dateTime('ended_at');

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
        Schema::drop('activity');
    }

}
