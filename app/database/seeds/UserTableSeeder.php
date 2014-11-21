<?php
use Flynsarmy\CsvSeeder\CsvSeeder;

class UserTableSeeder extends CsvSeeder {
	protected $hashable = 'CWID';
	
	public function __construct() {
		$this->table = 'users';
		$this->filename = app_path().'/students.csv';
	}

	//Need to override protected variable
	
	public function run() {
		DB::table('users')->delete();

		DB::disableQueryLog();

		DB::table($this->table)->truncate();

		DB::table('users')->insert(
				array(
					'id' => '1',
					'firstName' => 'Top',
					'lastName' => 'Admin',
					'CWID' => Hash::make('12345678'),
					'email' => 'admin@mines.edu',
					'is_admin' => TRUE,
					'created_at' => new DateTime,
					'updated_at' => new DateTime
				)
		);
		
		parent::run();

	}
}
?>