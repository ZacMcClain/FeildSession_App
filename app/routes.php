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

// ------------------------| Home (Student) page Section |------------------------\\

Route::get('/', function() // works
{
	return Redirect::to('students');
});

Route::get('students', function () // works
{
	$user = User::all();
	Return View::make('students/index')
		->with('students', $user);
});

// ------------------------| login Section |------------------------\\

Route::get('login', function() // works
{
	return View::make('login');
});


Route::post('login', function() // not sure if this is working yet
{
	if(Auth::attempt (Input::only('username', 'password')))
	{
		return Redirect::intended('/');
	} else {
		return Redirect::back()
		-> withInput()
		-> with('error', "Invalid credentials!");
	}
});