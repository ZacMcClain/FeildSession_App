<?php
use Flynsarmy\CsvSeeder\CsvSeeder;

class ProjectTableSeeder extends CsvSeeder {
	
	public function __construct() {
		$this->table = 'projects';
		$this->filename = app_path().'/projects.csv';
	}

	public function run() {
		DB::table('projects')->delete();

		DB::disableQueryLog();

		DB::table($this->table)->truncate();

		parent::run();
	}
}
?>