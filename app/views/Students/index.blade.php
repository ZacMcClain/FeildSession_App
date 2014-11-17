@extends('master')

@section('header')
<h2>
	CSCI Field Session 
</h2>
@stop

@section('content')
<h3> Projects: </h3>
<ul>
	@foreach($projects as $project)
		<div class="project">
				<li> <strong> {{$project->title}} </strong> - {{$project->company}}</li>
		</div>
	@endforeach
</ul>

<h3> Students: </h3>
<ul>
	@foreach($users as $user)
		<div class="user">
				<li> {{$user->firstName}} {{$user->lastName}}</li>
		</div>
	@endforeach
</ul>
@stop