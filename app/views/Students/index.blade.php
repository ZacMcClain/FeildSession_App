@extends('master')

@section('header')
<h2>
	CSCI Field Session Index
</h2>
@stop

@section('content')
<h3> Students: </h3>
<ul>
	@foreach($users as $user)
		<div class="user">
				<li> <strong>{{$user->firstName}} {{$user->lastName}} </strong> </li>
		</div>
	@endforeach
</ul>

<h3> Projects: </h3>
<ul>
	@foreach($projects as $project)
		<div class="project">
				<li> <strong> {{$project->title}} </strong> - {{$project->company}}</li>
		</div>
	@endforeach
</ul>
@stop