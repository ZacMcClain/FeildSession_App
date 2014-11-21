@extends('master')

@section('header')
	<h2>CSCI Field Session Projects</h2>
@stop

@section('content')

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
				<td><a href="#">{{$project->title}}</a></td>
				<td>{{$project->company}}</td>
				<td>{{$project->min}}</td>
				<td>{{$project->max}}</td>
			</tr>
		@endforeach
		</tbody>
	</table>

@stop