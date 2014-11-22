@extends('master')

@section('header')

<h2> 
<a href="{{URL::to('students')}}"> &larr;Cancel</a>
</h2>
@stop

@section('content')
	{{Form::open()}}
	
	{{Form::label('First Name:')}}
	{{Form::text('lastName')}}
	</div>
	
	<div class = "form-group">
	{{Form::label('Last Name')}}
	{{Form::text('firstName')}}
	</div>
	
	
	{{Form::submit("Save", array("class"=>"btn btn-default"))}}
	
	{{Form::close()}}
@stop