@extends('master')

@section('header')
<h2>Student Information:</h2>
@stop

@section('content')
Currently Logged in as:
<br>
<strong> First Name: </strong> {{Auth::user() -> firstName}}
<br>
<strong> Last Name: </strong> {{Auth::user() -> lastName}}
	
@stop