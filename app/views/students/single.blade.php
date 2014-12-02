@extends('master')

@section('header')
<h2><u>{{$user->firstName}} {{$user->lastName}}</u></h2>
<div class="container">
	@if(empty($preference))
	<a href="{{URL::to('students/'.Auth::user()->id.'/set_projects')}}">
		<span class="glyphicon glyphicon-edit"></span>Set Project Preferences
	</a>
	@else
	<a href="{{URL::to('students/'.Auth::user()->id.'/edit')}}">
		<span class="glyphicon glyphicon-edit"></span>Edit Project Preferences
	</a>
	@endif
	<br>
	<a href="{{URL::to('students/'.Auth::user()->id.'/set_teammates')}}">
		<span class="glyphicon glyphicon-edit"></span>Add Teammate Preference
	</a>
</div>
@stop

@section('content')
<br>
<div class="form-group">
	Major: {{$preference['major']}}
	<br>
	@if ($preference['minor'])
		Minor: {{$preference['minor']}}
	@else
		Minor: None Selected
	@endif
	<br>
</div>
<div class="container-fluid" id="push"></div>
<div class="form-group">
	<br>
	First Preference: {{ $projects->find($preference['firstChoice'])['title'] }}
	<br>
	Second Preference: {{ $projects->find($preference['secondChoice'])['title'] }}
	<br>
	Third Preference: {{ $projects->find($preference['thirdChoice'])['title'] }}
	<br>
	@if ( $projects->find($preference['fourthChoice'])['title'] )
		Fourth Preference (Optional): {{ $projects->find($preference['fourthChoice'])['title'] }}
	@else
		Fourth Preference (Optional): None Selected
	@endif
	<br>
</div>
<div class="container-fluid" id="push"></div>
<div class="form-group">
	<br>
	Team or Project Preference: {{ $preference['mostImportant'] }}
	<br>
	Helpful Info: {{$preference['experience']}}
	<br>
</div>
<div class="container-fluid" id="push"></div>
<div class="form-group">
	<br>
	Desired Teammates:
	<ul>
		@foreach($yesTeammates as $yes)
				<li>{{ $users->find($yes)['firstName'] . ' ' . $users->find($yes)['lastName'] }}</li>
		@endforeach
	</ul>
	Undesired Teammates: 
	<ul>
		@foreach($noTeammates as $no)
			<li>{{ $users->find($no)['firstName'] . ' ' . $users->find($no)['lastName'] }}</li>
		@endforeach
	</ul>
	<br>
</div>
@stop