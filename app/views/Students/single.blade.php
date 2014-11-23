@extends('master')

@section('header')
<h2><u>{{$user->firstName}} {{$user->lastName}}</u></h2>

@stop

@section('content')

Major: {{$preference}}
<br>
Minor:
<br>
First Preference:
<br>
Second Preference:
<br>
Third Preference:
<br>
Fourth Preference (Optional):
<br>
Team or Project Preference:
<br>
Helpful Info:
<br>
Preferred Teammates:
<br>
Undesirable Teammates:
<br>
<div class="container">
<br>
	<strong> First Name: </strong> {{Auth::user() -> firstName}}
	<br>
	<strong> Last Name: </strong> {{Auth::user() -> lastName}}
	<br>
	<strong> Email: </strong> {{Auth::user() -> email}}
<br>
	<a href="{{URL::to('students/'.Auth::user()->id.'/edit')}}">
		<span class="glyphicon glyphicon-edit"></span>Edit
	</a>
</div>
@stop