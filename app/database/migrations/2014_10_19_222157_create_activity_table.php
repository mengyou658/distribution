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
            $table->string('thumbnail', 256)->default('');
            $table->text('abstract')->default('');
            $table->text('content');

            $table->integer('series_id');
            $table->dateTime('began_at');
            $table->dateTime('ended_at');

            $table->integer('member_count')->default(0);

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
        Schema::drop('activity');
    }

}
