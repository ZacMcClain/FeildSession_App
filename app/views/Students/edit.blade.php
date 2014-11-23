@extends('master')

@section('header')

<h2> 
<a href="{{URL::to('students/'.Auth::user()->id)}}"> &larr;Cancel</a>
</h2>
@stop

@section('content')

@stop