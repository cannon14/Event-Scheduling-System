<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::dropIfExists('events');

		Schema::create('events', function ($table) {
			$table->increments('event_id');
			$table->integer('user_id');
			$table->integer('location_id');
			$table->string('event_name');
			$table->datetime('start_dtg');
			$table->datetime('end_dtg');
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
		Schema::drop('events');
	}

}
