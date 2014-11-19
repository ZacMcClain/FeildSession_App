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

	<table>
		@foreach($users as $user)
			<tr>
					<td> <strong>{{$user->firstName}}</strong> </td>
					<td><strong>{{$user->lastName}}</strong></td>
					<td>{{$user->email}} </td>
			</tr>
		@endforeach
	</table>
@stop