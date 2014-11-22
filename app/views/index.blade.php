@extends('master')

@section('header')
<h2>
	CSCI370 Field Session Index
</h2>
@stop

@section('content')

{{ 
	HTML::image(
			'img/coloradomountains755x269.jpg',
			'School of Mines moutains',
			array('id' => 'mines_mountains')
	)
}}

<p>
Welcome to CS Field Session!
</p>
<h3> Projects: </h3>
<div class="container">
	<p class="small">Click A Project to learn more!</p>
	<ul class="nav nav-pills nav-stacked">
	@foreach($projects as $project)
		<li style="">
			<a href="{{URL::to('projects/'.$project->id)}}">
				<strong>{{$project->title}}</strong>
				<small>By - {{$project->company}}</small>
			</a>
		</li>
	@endforeach
	</ul>
</div>
<div class="container" style="padding:5px;">
	<br>
	{{ 
		HTML::image(
				'img/M-and-moon.jpg',
				'School of Mines M amd Moon',
				array(
					'id' => 'mines_m',
					'style'=>'display:block; height: 250px; width: 250px; outline: 2px solid gray; margin-left: auto; margin-right: auto;'
				)
		)
	}}
	<br>
</div>
@stop