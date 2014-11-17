<?php
use Flynsarmy\CsvSeeder\CsvSeeder;

class ProjectTableSeeder extends CsvSeeder {
	public function __construct() {
		$this->table = 'projects';
		$this->filename = app_path().'/students.csv';
	}

	public function run() {
		DB::table('projects')->delete();

		DB::disableQueryLog();

		DB::table($this->table)->truncate();

		parent::run();

		//DB::table('users')->insert(array(
		//	array('lastName'=>'', 'firstName'=>'admin', 'CWID'=>00000000, 'email'=>'admin@admin.com', 'password'=>'kittenz', 'is_admin'=>true);
		//));

	}
}
?>