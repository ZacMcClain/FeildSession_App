@extends('master')

@section('header')
	<h2>{{$project->title}}</h2>
@stop

@section('content')

<div class="container">
	<div class="group">
		<h3>Company:</h3>
		<div class="container">
			<p style="padding:5px">{{$project->company}}</p>
		</div>
	</div>
	<br>
	<div class="group">
		<h3>Number of members:</h3>
		<div class="container" style="outline: 2px solid gray;">
			<p style="padding:5px">
				We are looking for a team of {{$project->min}} to {{$project->max}} 
				software engineers <br>
				to work on this project with us.
			</p>
		</div>
	</div>
</div>

@stop