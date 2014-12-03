@extends('master')

@section('header')

<h2> Manually Create Teams </h2>
@stop

@section('content')

{{ Form::model($team, array('method' => $method, 'url' => 'all_teams')) }}


	{{ Form::label('Project:') }}
	{{ Form::select('project_id',  $projects) }}
	<span class='glyphicon glyphicon-asterisk small' style='color: red;'></span>
	<br>

	{{ Form::label('Members:') }}<br>
	{{ Form::select('person1_id', $users) }} <br>
	{{ Form::select('person2_id', $users) }} <br>
	{{ Form::select('person3_id', array_merge(['None'], $users) }} <br>
	{{ Form::select('person4_id', array_merge(['None'], $users), 1) }} <br>
	{{ Form::select('person5_id', array_merge(['None'], $users), 1) }} <br>
 	{{ Form::select('person6_id', array_merge(['None'], $users), 1) }} <br>
	<br><br>
	{{ Form::submit('Save Team') }}

	{{ Form::close() }}
@stop