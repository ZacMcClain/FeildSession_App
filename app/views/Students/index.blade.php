@extends('master')

@section('header')
<h2>
	CSCI Field Session Index
</h2>


@stop

@section('content')

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