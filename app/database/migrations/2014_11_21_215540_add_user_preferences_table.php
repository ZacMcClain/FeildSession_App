<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserPreferencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('preferences');
		Schema::create('preferences', function($table) 
		{
			$table->increments('id');
			$table->string('major')->nullable();
			$table->string('minor')->nullable();
			// The selected project_id or the projects will be stored here
			$table->integer('firstChoice'); 
			$table->integer('secondChoice');
			$table->integer('thirdChoice');
			$table->integer('fourthChoice')->nullable();
			//users importantce rating for project, teammate(s)
			$table->string('mostImportant');
			//Users experance will be stored in this column 
			$table->string('experience')->nullable();
			//This column creates a connection (foreign key) between users and there preferances
			$table->integer('user_id')->nullable()->references('id')->on('users'); 

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('preferences');
	}

}
