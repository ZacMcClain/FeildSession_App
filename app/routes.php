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
	$user = User::find($id);
	$preference = Preference::where('user_id', '=', Auth::user()->id)->first();;
	return View::make('students.single')
		->with('user', $user)
		->with('preference', $preference);
	});
	
	Route::get('students/{id}/edit', function ($id)
	{
		$projects = Project::all();
		$projects_list = Project::lists('title', 'id');
		$id = Auth::user()->id;
		$user = User::find($id);
		$preference = Preference::find($user->preference_id);
		return View::make('forms/app_form')
			->with('projects', $projects)
			->with('projects_list', $projects_list)
			->with('user', $user)
			->with('preference', $preference)
			->with('method', 'post');
		
	});

	Route::get('students/{id}/set', function($id) {
		$pref = new Preference;
		$projects_list = Project::lists('title', 'id');
		return View::make('students/set')
			->with('pref', $pref)
			->with('method', 'post')
			->with('projects_list', $projects_list);
	});

	Route::post('students/{id}', function() {
		$pref = Preference::create(Input::all());
		return Redirect::to('students/'.Auth::user()->id)
			->with('message', 'Successfully set your preferences!');
	});


	//------------------------| Form Section |------------------------\\

	Route::post('teams_form', function()
	{
		$preference = Preference::create(Input::all());
		return Redirect::to('teams_form')
			->with('message', 'Your Project Preferences have been saved.');

	});

	Route::get('teams_form', function()
	{
		return View::make('forms/teams_form');
	});

	//------------------------| Administration Section |------------------------\\

	Route::get('admin_index', array('before'=>'admin', function() // admin only
	{
		$projects = Project::all();
		$users = User::all();
		$preferences = Preference::all();
		return View::make('admin/admin_index')
			->with('projects', $projects)
			->with('users', $users)
			->with('preferences', $preferences);
	}));

	//------------------------| Team Section |------------------------\\

	Route::get('my_team', function()
	{
		return View::make('teams/team');
	});

	Route::get('all_teams', array('before'=>'admin', function() // admin only
	{
		return View::make('teams/teams');
	}));
});

//---------------------------------------| Guest Section |---------------------------------------\\

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