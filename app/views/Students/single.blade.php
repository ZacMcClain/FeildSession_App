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
Minor: {{$preference['minor']}}
<br>
</div>
<div class="container-fluid" id="push"></div>
<div class="form-group">
First Preference: {{$preference['firstChoice']}}
<br>
Second Preference: {{$preference['secondChoice']}}
<br>
Third Preference: {{$preference['thirdChoice']}}
<br>
Fourth Preference (Optional): {{$preference['fourthChoice']}}
<br>
</div>
<div class="container-fluid" id="push"></div>
<div class="form-group">
Team or Project Preference: {{$preference['mostImportant']}}
<br>
Helpful Info: {{$preference['experience']}}
<br>

@stop