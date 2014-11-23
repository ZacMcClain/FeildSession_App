@extends('master')

@section('header')
<h2><u>{{$user->firstName}} {{$user->lastName}}</u></h2>

@stop


@section('content')
<div class="container">
	<a href="{{URL::to('students/'.Auth::user()->id.'/edit')}}">
		<span class="glyphicon glyphicon-edit"></span>Edit
	</a>
</div>
@stop