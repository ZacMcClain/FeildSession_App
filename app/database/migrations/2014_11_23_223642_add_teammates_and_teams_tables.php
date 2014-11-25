<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTeammatesAndTeamsTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('teammates');
		Schema::create('teammates', function($table) 
		{
			$table->increments('id');
			$table->integer('person1_id');
			$table->integer('person2_id');
			$table->boolean('want_to_work_with'); 
		});

		Schema::dropIfExists('team');
		Schema::create('team', function($table) 
		{
			$table->increments('id');
			$table->integer('project_id');
			$table->integer('person1_id');
			$table->integer('person2_id');
			$table->integer('person3_id');
			$table->integer('person4_id');
			$table->integer('person5_id');
			$table->integer('person6_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('teammates');
		Schema::dropIfExists('team');
	}

}
