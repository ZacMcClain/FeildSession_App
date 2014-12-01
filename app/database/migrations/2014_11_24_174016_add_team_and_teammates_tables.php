<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTeamAndTeammatesTables extends Migration {

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
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('teammates');
	}

}
