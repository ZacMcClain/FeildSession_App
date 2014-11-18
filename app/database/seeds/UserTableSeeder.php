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

		DB::table('users')->insert(
				array(
					'lastName'=>'top',
					'firstName'=>'admin',
					'CWID'=>Hash::make('12345678'),
					'email'=>'admin@admin.com',
					'is_admin'=>true
				)
		);
		
		parent::run();

		

	}
}
?>