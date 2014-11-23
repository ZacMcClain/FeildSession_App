@extends('master')

@section('header')
<h2><u>{{$user->firstName}} {{$user->lastName}}</u></h2>

@stop


@section('content')
<br>
Major: {{$preference['major']}}
<br>
Minor: {{$preference['minor']}}
<br>
First Preference: {{$preference['firstChoice']}}
<br>
Second Preference: {{$preference['secondChoice']}}
<br>
Third Preference: {{$preference['thirdChoice']}}
<br>
Fourth Preference (Optional): {{$preference['fourthChoice']}}
<br>
Team or Project Preference: {{$preference['mostImportant']}}
<br>
Helpful Info: {{$preference['experience']}}
<br>
Preferred Teammates:
<br>
Undesirable Teammates:
<br>
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
</div>
@stop