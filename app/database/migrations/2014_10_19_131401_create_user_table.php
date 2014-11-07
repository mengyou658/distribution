<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('email', 64);
            $table->string('name', 16);
            $table->string('password', 64);

            $table->string('avatar', 256)->default('');
            $table->string('descr', 512)->default('');

            $table->boolean('is_confirmed')->default(false);
            $table->string('status', 16)->default('member');

            $table->rememberToken();
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
        Schema::drop('user');
    }

}
