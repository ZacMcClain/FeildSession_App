<?php
use Flynsarmy\CsvSeeder\CsvSeeder;

class UserTableSeeder extends CsvSeeder {
	public function __construct() {
		$this->table = 'users';
		$this->filename = app_path().'/students.csv';
	}

	public function run() {
		DB::table('users')->delete();

		DB::disableQueryLog();

		DB::table($this->table)->truncate();

		parent::run();

		//DB::table('users')->insert(array(
		//	array('lastName'=>'', 'firstName'=>'admin', 'CWID'=>00000000, 'email'=>'admin@admin.com', 'password'=>'kittenz', 'is_admin'=>true);
		//));

	}
}
?>