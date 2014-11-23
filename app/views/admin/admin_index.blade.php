@extends ('master')

@section('header')

	<h2>Application Administration:</h2>


@stop

@section('content')

<div class="jumbotron">
	<h3>Team Genorating Algorithm:</h3>
	<br>
	<p>
		The fallowing button will activate this applications team maker, and
		will take you to a display of the newly generated teams. As You are this
		sites admin user you will be allowed to edit, delete or save the results of
		these automatic team selections.
	</p>
	<br>
	<a href="#" class='btn btn-success' style='width:25%;'>Generate Teams</a>
</div>

<div class="group col-md-5">
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

<div class="group col-md-7">
	<h3>Preferences:</h3>
	
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>First Choice<small> (Project ID)</small></th>
				<th>Second Choice<small> (Project ID)</small></th>
				<th>Third Choice<small> (Project ID)</small></th>
				<th>Fourth Choice<small> (Project ID)</small></th>
				<th>Importance</th>
				<th>Experience</th>
			</tr>
		</thead>
		<tbody>
		
		@foreach($preferences as $preference)
			<tr>
				<td>{{ $preference->user['firstName'] }} {{ $preference->user['lastName'] }}</td>
				<td>{{ $preference->firstChoice }}</td>
				
				<td>{{ $preference->secondChoice }}</td>
				<td>{{ $preference->thirdChoice }}</td>
				@if ($preference->fourthChoice != NULL)
					<td>{{ $preference->fourthChoice }}</td>
				@else
					<td>NA</td>
				@endif
				<td>{{ $preference->mostImportant }}</td>
				@if ($preference->experience != NULL)
					<td>{{ $preference->experience }}</td>
				@else
					<td>NA</td>
				@endif
			</tr>
		@endforeach

		</tbody>
	</table>

</div>

<br>

<div class="group col-md-12">
	<h3>Projects:</h3>
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