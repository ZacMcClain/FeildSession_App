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

Route::get('/', function()
{
	return Redirect::to('students');
});

Route::get('students', function ()
{
	$user = User::all();
	Return View::make('students/index')
		->with('students', $user);
});
