@extends ('master')

@section('header')

	<h2>Admin View</h2>

@stop

@section('content')

<div class="jumbotron">
	<h3>Team Generating Algorithm:</h3>
	<br>
	<p> 
	<small>
		The following button will activate the team generation algorithm and
		will take you to a page with the newly generated teams. As this
		sites admin user, you are allowed to edit the results of
		these automatic team selections.
	</small>
	</p>
	<br>
	<a href="{{ URL::route('generate_teams') }}" class='btn btn-success' style='width:25%;'>Generate Teams</a>
	<br>
	<h3>Manually Create/Edit Teams:</h3>
	<br>
	<a href="{{ URL::route('edit_teams') }}" class='btn btn-success' style='width:25%;'>Manually Create/Edit Teams</a>
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
				<td><strong><a href="{{URL::to('admin_student/'.$user->id)}}">{{$user->firstName}} {{$user->lastName}}</a></strong></td>
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
<div class="group col-md-8">
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

<div class="group col-md-7">
	<h3>Team Preferences:</h3>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Person 1</th>
				<th>Person 2</th>
				<th>Want to work together</th>
			</tr>
		</thead>
		<tbody>
		@foreach($teammates as $teammate)
			<tr>
				<td>{{ $teammate->person1['firstName'] }} {{ $teammate->person1['lastName'] }}</td>
				<td>{{ $teammate->person2['firstName'] }} {{ $teammate->person2['lastName'] }}</td>
				@if ($teammate->want_to_work_with == 1)
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