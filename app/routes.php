<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//---------------------------------------| Model Section |---------------------------------------\\

Route::model('user', 'User');
Route::model('project', 'Project');
Route::model('preference', 'Preference');
Route::model('teammate', 'Teammate');
Route::model('team', 'Team');

//---------------------------------------| Logged In Section |---------------------------------------\\

Route::group(array('before'=>'auth'), function() {

	//------------------------| Home (Student) page Section |------------------------\\
	Route::get('/', function() 
	{
		return Redirect::to('home');
	});

	Route::get('home', function() 
	{
		$projects = Project::all();
		$users = User::all();
		return View::make('index')
			->with('projects', $projects)
			->with('users', $users);
	});

	Route::get('students/students', function ()
	{
		$user = User::all();
		return View::make('students/students')
			->with('student', $user);
	});

	Route::get('students/{id}', function($id)
	{
		if($id != Auth::user()->id) {
			return Redirect::to('students/'.Auth::user()->id);
		}
	$user = User::find($id);
	$preference = Preference::where('user_id', '=', Auth::user()->id)->first();
	$yesTeammates = Teammate::where('person1_id', '=', $id)->where('want_to_work_with', '=', '1')
	->lists('person2_id');
	$noTeammates = Teammate::where('person1_id', '=', $id)->where('want_to_work_with', '!=', '1')->lists('person2_id');
	return View::make('students.single')
		->with('user', $user)
		->with('preference', $preference)
		->with('yesTeammates', $yesTeammates)
		->with('noTeammates', $noTeammates);
	});
	
	Route::get('students/{id}/edit', function ($id)
	{
		$projects_list = Project::lists('title', 'id');
		$id = Auth::user()->id;
		$user = User::find($id);
		$preference = Preference::where('user_id', '=', Auth::user()->id)->first();
		return View::make('students/edit')
			->with('projects_list', $projects_list)
			->with('user', $user)
			->with('preference', $preference)
			->with('method', 'put');
		
	});
	
	Route::put('students/{id}', function($id) {
		$preference = Preference::where('user_id', '=', Auth::user()->id)->first();
		$preference->update(Input::all());
		return Redirect::to('students/'.Auth::user()->id)
		->with('message', 'Successfully updated preferences!');
});

	Route::get('students/{id}/set_projects', function($id) {
		$checkPref = Preference::where('user_id', '=', Auth::user()->id)->first();
		
		if($checkPref!=null) {
			return Redirect::to('students/'.Auth::user()->id.'/edit');
		}
		
		$preference = new Preference;
		$projects_list = Project::lists('title', 'id');
		return View::make('students/set_projects')
			->with('check', $checkPref)
			->with('preference', $preference)
			->with('method', 'post')
			->with('projects_list', $projects_list);
	});

	Route::get('students/{id}/set_teammates', function($id) {
		$teammate = new Teammate;
		$user_list = User::lists('firstName', 'id');
		return View::make('students/set_teammates')
			->with('teammate', $teammate)
			->with('method', 'post')
			->with('user_list', $user_list);
	});

	Route::post('students/{id}', function() {
		$pref = Preference::create(Input::all());
		return Redirect::to('students/'.Auth::user()->id)
			->with('message', 'Successfully set your preferences!');
	});

		Route::post('students', function() {
		$pref = Teammate::create(Input::all());
		return Redirect::to('students/'.Auth::user()->id)
			->with('message', 'Successfully set your preferences!');
	});

	//------------------------| Administration Section |------------------------\\

	Route::get('admin_index', array('before'=>'admin', function() // admin only
	{
		$projects = Project::all();
		$users = User::all();
		$preferences = Preference::all();
		$teammates = Teammate::all();
		return View::make('admin/admin_index')
			->with('projects', $projects)
			->with('users', $users)
			->with('preferences', $preferences)
			->with('teammates', $teammates);
	}));
	
	Route::get('admin_student/{id}', array('before'=>'admin', function($id) // admin only
	{
	$user = User::find($id);
	$preference = Preference::where('user_id', '=',$id)->first();
	return View::make('admin/admin_student')
		->with('user', $user)
		->with('preference', $preference);
	}));

	//------------------------| Team Section |------------------------\\

	Route::get('my_team', function()
	{
		return View::make('teams/team');
	});

	Route::get('all_teams', array('before'=>'admin', function() // admin only
	{
		return View::make('teams/AllTeams')
			->with('generateTeams', 0);
	}));

	Route::get('generate_teams', array('as'=>'generate_teams', function() 
	{
		return Redirect::to('admin_generate_teams');
	}));

	Route::get('admin_generate_teams', array('before'=>'admin', function() // admin only
	{
		$projects = Project::all();
		$users = User::all();
		$preferences = Preference::all();
		$teammates = Teammate::all();
		$student_pool = User::lists('id');
		return View::make('teams/AllTeams')
			->with('projects', $projects)
			->with('users', $users)
			->with('preferences', $preferences)
			->with('teammates', $teammates)
			->with('student_pool', $student_pool)
			->with('generateTeams', 1);
	}));

	Route::get('edit_teams', array('as'=>'edit_teams', function() 
	{
		return Redirect::to('admin_edit_teams');
	}));

	Route::get('admin_edit_teams', array('before'=>'admin', function() // admin only
	{
		$team = new Team;
		$projects = Project::lists('title', 'id');
		$preferences = Preference::all();
		$teammates = Teammate::all();
		$student_pool = User::lists('id');
		$users = User::lists('firstName', 'id');
		return View::make('teams/edit_teams')
			->with('team', $team)
			->with('projects', $projects)
			->with('users', $users)
			->with('preferences', $preferences)
			->with('teammates', $teammates)
			->with('student_pool', $student_pool)
			->with('method', 'post');

	}));

	Route::post('all_teams', function() {
		$project_id = Input::get('project_id');
		DB::table('team')->where('project_id', $project_id)->delete();
		DB::table('team')->insertGetId(
						array('project_id' => $project_id, 
						'person1_id' => Input::get('person1_id'), 
						'person2_id' => Input::get('person2_id'), 
						'person3_id' => Input::get('person3_id'), 
						'person4_id' => Input::get('person4_id'), 
						'person5_id' => Input::get('person5_id'),
						'person6_id' => Input::get('person6_id')
						));
		return Redirect::to('all_teams')
			->with('message', 'Successfully saved team!');
	});

});

//------------------------| Home Section |------------------------\\

Route::get('/', function() 
{
	return Redirect::to('home');
});

Route::get('home', function() 
{
	$projects = Project::all();
	$users = User::all();
	return View::make('index')
		->with('projects', $projects)
		->with('users', $users);
});

//------------------------| Project Section |------------------------\\

Route::get('projects', function()
{
	$projects = Project::all();
	return View::make('projects/projects')
		->with('projects', $projects);
});

Route::get('projects/{id}', function($id)
{
	$project = Project::find($id);
	return View::make('projects.single')
		->with('project', $project);
});

//------------------------| login Section |------------------------\\



Route::get('login', array('before'=>'guest', function() {
	return View::make('login');
}));

Route::post('login', function(){

	$user = User::where('email', '=', Input::get('email'))->first();

	if($user != null && Hash::check(Input::get('cwid'), $user->CWID)) {
		Auth::login($user);
		return Redirect::intended('/');
	}
	//if(Auth::attempt(Input::only('email','cwid'))) 
	//	return Redirect::intended('/');
	else 
		return Redirect::back()
		-> withInput()
		-> with('error', "Invalid credentials!");
});

Route::get('logout', function() {
	Auth::logout();
	return Redirect::to('login');
});