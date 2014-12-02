@extends('master')

@section('header')

<h2> Setting Your Teammate Preferences </h2>
@stop

@section('content')

{{ Form::model($teammate, array('method' => $method, 'url' => 'students')) }}

	{{ Form::hidden('person1_id', Auth::user()->id) }}

	{{ Form::label('Select another student:') }}
	{{ Form::select('person2_id',  $user_list) }}
	<span class='glyphicon glyphicon-asterisk small' style='color: red;'></span>
	<br>

	{{ Form::label('Would you like to work with this student?') }} <br>
	{{ Form::label('Yes')}}
	{{ Form::radio('want_to_work_with', TRUE) }}<br>
	{{ Form::label('No')}}
	{{ Form::radio('want_to_work_with', FALSE) }} <br><br>

	{{ Form::submit('Save Preferences') }}

	{{ Form::close() }}
@stop