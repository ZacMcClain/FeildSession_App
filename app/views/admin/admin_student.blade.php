@extends('master')

@section('header')
<h2><u>Overview - {{$user->firstName}} {{$user->lastName}}</u></h2>
@stop
@section('content')
<div class="form-group">
<br>
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