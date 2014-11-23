@extends('master')

@section('header')
<h2><u>{{$user->firstName}} {{$user->lastName}}</u></h2>
<div class="container">
	@if(empty($preference))
	<a href="{{URL::to('students/'.Auth::user()->id.'/set')}}">
		<span class="glyphicon glyphicon-edit"></span>Set Preferences
	</a>
	@else
	<a href="{{URL::to('students/'.Auth::user()->id.'/edit')}}">
		<span class="glyphicon glyphicon-edit"></span>Edit
	</a>
	@endif
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
</div>
<div class="container-fluid" id="push"></div>
Preferred Teammates:
<br>
Undesirable Teammates:
<br>


@stop