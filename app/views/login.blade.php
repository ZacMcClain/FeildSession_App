@extends ('master')

@section('header')

	<h2>CSCI370 Log In</h2>

@stop

@section('content')

	<div class="container">
	{{Form::open()}}
	
		<div class="form-group">
			{{Form::label('Email')}} 
			{{Form::text('email')}}
		</div>

		<div class="form-group">
			{{Form::label('CWID')}} 
			{{Form::password('cwid')}}
		</div>

		<div class="form-group">
			{{Form::label('Remember me?')}}
			{{Form::checkbox('remember_me', 'true') }}
		</div>

		{{Form::submit("Log in", array("class"=>"btn btn-default"))}}
	{{Form::close()}}
	</div>
@stop