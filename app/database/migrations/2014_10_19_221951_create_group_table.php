<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group', function(Blueprint $table)
        {
            $table->increments('id');

            //$table->string('sign', 16);
            $table->string('name', 16);
            $table->string('thumbnail', 256);

            $table->text('descr')->default('');

            $table->integer('discuss_id');

            //$table->boolean('is_public')->default(true);

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
        Schema::drop('group');
    }

}
