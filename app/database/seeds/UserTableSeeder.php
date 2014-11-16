<?php
class UserTableSeeder extends Seeder {
	public function run() {
		DB::table('users')->delete();
		DB::table('projects')->delete();

		DB::table('users')->insert(array(
			array('lastName'=>'', 'firstName'=>'admin', 'CWID'=>00000000, 'email'=>'admin@admin.com', 'password'=>'kittenz', 'is_admin'=>true);
		));

		DB::table('genres')->insert(array(
			array('id'=>1, 'name'=>'Humorous'),
			array('id'=>2, 'name'=>'Inspirational'),
			array('id'=>3, 'name'=>'Romantic')
		));
	}
}
?>