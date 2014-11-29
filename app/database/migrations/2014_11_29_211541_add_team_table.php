<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTeamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('team');
		Schema::create('team', function($table) 
		{
			$table->increments('id');
			$table->integer('project_id');
			$table->integer('person1_id');
			$table->integer('person2_id')->nullable;
			$table->integer('person3_id')->nullable;
			$table->integer('person4_id')->nullable;
			$table->integer('person5_id')->nullable;
			$table->integer('person6_id')->nullable;
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('team');
	}

}
