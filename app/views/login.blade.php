@extends('master')

@section('header')
<h2>Login</h2>
@stop

@section('content')

	<div class = "form-group">
	{{Form::label('Username:')}}
	{{Form::text('username')}}
	</div>

	<div class = "form-group">
	{{Form::label('Password:')}}
	{{Form::password('password')}}
	</div>

{{Form::submit("Save", array("class"=>"btn btn-default"))}}

	
@stop