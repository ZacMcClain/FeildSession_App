@extends('master')

@section('header')
<h2>Team Information</h2>
@stop

@section('content')
	<p>Your team has not yet been created by the admin</p>
	{{ HTML::mailto('admin@mines.edu', 'Email Admin') }}
@stop