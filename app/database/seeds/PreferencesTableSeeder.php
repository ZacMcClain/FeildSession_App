<?php

class PreferencesTableSeeder extends Seeder
{
	public function run() 
	{
		DB::table('preferences')->delete();

		DB::table('preferences')->insert(
			array(
				array(
					'id'=>1,
					'firstChoice'=> -1,
					'secondChoice'=> -1,
					'thirdChoice'=> -1,
					'fourthChoice'=>NULL,
					'mostImportant'=>'NA',
					'experience'=>NULL,
					'user_id'=>1
				)
			)
		);
	}
}

?>