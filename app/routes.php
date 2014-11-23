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
	return View::make('students.single')
		->with('user', $user);
	});
	
	Route::get('students/{id}/edit', function ($id)
	{
		$user = User::find($id);
		return View::make('students/edit')
			->with('student', $user);
		
	});


	//------------------------| Form Section |------------------------\\

	Route::get('app_form/', function()
	{
		$projects = Project::all();
		$id = Auth::user()->id;
		$user = User::find($id);
		$preference = Preference::find($user->preference_id);
		return View::make('forms/app_form')
			->with('projects', $projects)
			->with('user', $user)
			->with('preference', $preference)
			->with('method', 'post');
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