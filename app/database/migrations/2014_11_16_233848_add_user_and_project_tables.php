<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserAndProjectTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
			$table->string('lastName');
			$table->string('firstName');
			$table->increments('CWID');
			$table->string('email');
			$table->string('password');
			$table->boolean('is_admin');
		});

		Schema::create('projects', function($table){
			$table->increments('project_id');
			$table->string('company');
			$table->string('title');
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
