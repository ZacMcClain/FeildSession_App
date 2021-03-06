@extends('master')

@section('header')

<h2> Editing your preferences </h2>
@stop

@section('content')

{{ Form::model($preference, array('method' => $method, 'url' => 'students/'.Auth::user()->id)) }}

		<div class="input-group">
			<span class="glyphicon glyphicon-info-sign"></span>
			{{ Form::label('Major, Minor/Asi:') }}

			{{ Form::text('major', $preference->major,
				array('class' => 'form-control', 'id' =>'focusedInput')) }}
			<span class='glyphicon glyphicon-asterisk small' style='color: red;'></span>
			{{ Form::text('minor', $preference->minor,
				array('class' => 'form-control', 'id' =>'focusedInput')) }}
		</div>
		<br>
		<div class="container-fluid" id="push"></div>
		<div class="form-group">
			<br>
			<div>
				<span class="glyphicon glyphicon-question-sign"></span>
				{{ Form::label('Project Choices:') }} 
			</div>				
			<p class="small">
				Please select from all teams and projects Which you would most like to work
				on in decending order.
			</p>
			<div class='input-group'>
				1)
				{{ Form::select('firstChoice',  $projects_list) }}
				<span class='glyphicon glyphicon-asterisk small' style='color: red;'></span>
				<br>
				<br>
				2)
				{{ Form::select('secondChoice',  $projects_list) }}
				<span class='glyphicon glyphicon-asterisk small' style='color: red;'></span>
				<br>
				<br>
				3)
				{{ Form::select('thirdChoice', $projects_list) }}
				<span class='glyphicon glyphicon-asterisk small' style='color: red;'></span>
				<br>
				<br>
				4)
				{{ Form::select('fourthChoice', array_merge(['Unselected'], $projects_list), 1) }}
			</div>
		</div>
		<div class="container-fluid" id="push"></div>
		<br>
		<div class="row">
			<div class="form-group col-sm-6">
				<span class="glyphicon glyphicon-exclamation-sign"></span>
				{{Form::label('Project or Team:')}}
				<p class="small">
					When selecting teams, which matters most: getting the project you wanted or working with the people you wanted?
				</p>
				{{ Form::select('mostImportant', 
						[
	   					'project' => 'Project',
	   					'team' => 'Team',
	  					'dontCare' => 'Does Not Matter'
	  					]
				) }}
				<span class='glyphicon glyphicon-asterisk small' style='color: red;'></span>
			</div>
			<div class="form-group col-sm-6">
				<span class="glyphicon glyphicon-question-sign"></span>
				{{Form::label('Helpful info:')}}
				<p class="small">
					Please share any other experience, skill or goals that might
					be relevant to your project choices. 
				</p>
				{{Form::textArea('experience')}}
			</div>
		</div>
		<div class="container-fluid" id="push"></div>
		<br>
		<div class='form-group col-lg-12'>
			<p>
				<span class='glyphicon glyphicon-asterisk small' style='color: red;'></span>
				Denotes a required field
			</p>
		</div>

		{{Form::hidden('user_id', Auth::user()->id)}}

		{{ Form::submit('Save Preferences') }}

		{{ Form::close() }}

@stop