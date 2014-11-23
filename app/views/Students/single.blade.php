@extends('master')

@section('header')
<h2><u>{{$user->firstName}} {{$user->lastName}}</u></h2>

@stop

@section('content')
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