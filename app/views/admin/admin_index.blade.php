@extends ('master')

@section('header')

	<h2>Application Administration:</h2>


@stop

@section('content')

<div class="jumbotron">
	<h3>Team Making Algorithm:</h3>
	<br>
	<p>
		The fallowing button will activate this applications Team genorating and take <br>
		you to a new display of the generated teams. As this sites admin you will <br>
		be allowed to edit or save the results of these automatic team selections. <br>
	</p>
	<br>
	<a href="#" class='btn btn-success' style='width:25%;'>Generate Teams</a>
</div>

<div class="group col-md-7">
	<h3> Students: </h3>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Student ID</th>
				<th>Name</th>
				<th>Email Address</th>
				<th>Admin Rights</th>
			</tr>
		</thead>
		<tbody>
		@foreach($users as $user)
			<tr>
				<td>{{$user->id}}</td>
				<td><strong><a href="{{URL::to('students/'.$user->id)}}">{{$user->firstName}} {{$user->lastName}}</a></strong></td>
				<td>{{$user->email}}</td>
				@if ($user->is_admin == 1)
					<td>Yes</td>
				@else
					<td>No</td>
				@endif
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
<br>
<div class="group col-md-12">
<h3> Projects: </h3>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Project ID</th>
			<th><strong>Project Title</strong></th>
			<th><strong>Company<strong></th>
			<th>Minimum Memebers</th>
			<th>Maximum Memebers</th>
		</tr>
	</thead>
	<tbody>
	@foreach($projects as $project)
		<tr>
			<td>{{$project->id}}</td>
			<td><a href="{{URL::to('projects/'.$project->id)}}">{{$project->title}}</a></td>
			<td>{{$project->company}}</td>
			<td>{{$project->min}}</td>
			<td>{{$project->max}}</td>
		</tr>
	@endforeach
	</tbody>
</table>
</div>
@stop