@extends('master')

@section('header')
	<h2>HI</h2>
@stop

@section('content')

<div class="container">
	<div class="group">
		<h3>Company:</h3>
		<p>{{$project->company}}</p>
	</div>
	<br>
	<div class="group">
		<h3>Number of members:</h3>
		<p>
			We are looking for a team of {{$project->min}} to {{$project->max}} 
			software engineers to work on this project with us.
		</p>
	</div>
	<br>
	<div class="group">
		<h3>Project Discription</h3>
		<p>
			blah blah blah <br>
			yata yata yata <br>
			so on and so forth.
		</p>
	</div>
</div>

@stop