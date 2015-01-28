<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

/**
 * Run the migrations.
 *
 * @return void
 */
public function up() {

    Schema::dropIfExists('users');

    Schema::create('users', function($table) {
        $table->increments('user_id');
        $table->string('title', 25);
        $table->string('password', 64);
        $table->string('firstname', 25);
        $table->string('lastname', 25);
        $table->string('department', 25);
        $table->string('email')->unique();
        $table->string('telephone', 25);
        $table->timestamps();
    });
}

/**
 * Reverse the migrations.
 *
 * @return void
 */
public function down() {
    Schema::drop('users');
}

}
