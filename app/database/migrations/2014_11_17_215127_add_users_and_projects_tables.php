<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersAndProjectsTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('users');
		Schema::create('users', function($table) {
			$table->string('lastName');
			$table->string('firstName');
			$table->increments('CWID');
			$table->string('email');
			$table->boolean('is_admin');
		});

		Schema::dropIfExists('projects');
		Schema::create('projects', function($table){
			$table->increments('id');
			$table->string('company');
			$table->string('title');
			$table->integer('min');
			$table->integer('max');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
		Schema::drop('projects');
	}

}
