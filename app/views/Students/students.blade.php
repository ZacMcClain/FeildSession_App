@extends('master')

@section('header')
<h2>Student Information:</h2>
@stop

@section('content')
Currently Logged in as:
<div class="container-fluid">
	<br>
	<strong> First Name: </strong> {{Auth::user() -> firstName}}
	<br>
	<strong> Last Name: </strong> {{Auth::user() -> lastName}}
</div>

<a href="{{URL::to('students/edit')}}">
	<span class="glyphicon glyphicon-edit"></span>Edit
</a>
@stop