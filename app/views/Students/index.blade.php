@extends('master')

@section('header')
<h2>
	CSCI Field Session Index
</h2>
@stop

@section('content')
{{--<h3> Students: </h3>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email Address</th>
		</tr>
	</thead>
	<tbody>
	@foreach($users as $user)
		<tr>
			<td><strong><a href="#">{{$user->firstName}} {{$user->lastName}}</a></strong></td>
			<td>{{$user->email}}</td>
		</tr>
	@endforeach
	</tbody>
</table>
--}}
<p>
Welcome to CS Field Session!
</p>
<h3> Projects: </h3>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th><strong>Project Title</strong></th>
			<th><strong>Company<strong></th>
			<th>Minimum Memebers</th>
			<th>Maximum Memebers</th>
		</tr>
	</thead>
	<tbody>
	@foreach($projects as $project)
		<tr>
			<td><a href="{{URL::to('projects/'.$project->id)}}">{{$project->title}}</a></td>
			<td>{{$project->company}}</td>
			<td>{{$project->min}}</td>
			<td>{{$project->max}}</td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop