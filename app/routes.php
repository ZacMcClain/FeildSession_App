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

// ------------------------| Model Section |------------------------\\

Route::model('user', 'User');
Route::model('project', 'Project');



Route::group(array('before'=>'auth'), function() {

	// -----------------------| Home (Student) page Section |---------------------\\
	Route::get('/', function() 
	{
		return Redirect::to('students');
	});

	Route::get('home', function() 
	{
		$projects = Project::all();
		$users = User::all();
		return View::make('students/index')
			->with('projects', $projects)
			->with('users', $users);
	});

	Route::get('students', function ()
	{
		$user = User::all();
		return View::make('students/students')
			->with('student', $user);
	});
	
	Route::get('students/edit', function ()
	{
		$user = User::all();
		return View::make('students/edit')
			->with('student', $user);
	});

	// ------------------------| Form Section |------------------------\\

	Route::get('app_form', function()
	{
		$projects = Project::all();
		$users = User::all();
		return View::make('forms/app_form')
			->with('projects', $projects)
			->with('students', $users);
	});

});

// ------------------------| Project Section |------------------------\\

Route::get('projects', function()
{
	$projects = Project::all();
	return View::make('projects/projects')
		->with('projects', $projects);
});



// ------------------------| login Section |------------------------\\


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