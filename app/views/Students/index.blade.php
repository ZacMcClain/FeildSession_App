@extends('master')

@section('header')
<h2>
	CSCI Field Session Index
</h2>
@stop

@section('content')
<h3> Students: </h3>
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

<h3> Projects: </h3>
<ul>
	@foreach($projects as $project)
		<div class="project">
				<li> <strong> {{$project->title}} </strong> - {{$project->company}}</li>
		</div>
	@endforeach
</ul>
@stop