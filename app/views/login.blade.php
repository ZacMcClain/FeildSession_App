@extends ('master')

@section('header')

	<h2>Please Log In</h2>

@stop

@section('content')

	
	{{Form::open()}}
		<div class="form-group">
			{{Form::label('Email')}} 
			{{Form::text('email')}}
		</div>

		<div class="form-group">
			{{Form::label('CWID')}} 
			{{Form::password('cwid')}}
		</div>
		{{Form::submit("Log in", array("class"=>"btn btn-default"))}}
	{{Form::close()}}

@stop