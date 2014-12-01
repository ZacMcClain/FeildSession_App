@extends('master')

@section('header')

<h2> Setting Your Preferences </h2>
<p class='small'>
	<span class='glyphicon glyphicon-asterisk small' style='color: red;'></span>
	Denotes a required feild
</p>

@stop

@section('content')

{{ Form::model($preference, array('method' => $method, 'url' => 'students/'.Auth::user()->id)) }}
		
		<div class="input-group">
			<span class="glyphicon glyphicon-info-sign"></span>
			{{ Form::label('Major, Minor/Asi:') }}
			{{ Form::text('major', '',
				array('class' => 'form-control', 'id' =>'focusedInput', 'placeholder'=>'Your Major? (Required)')) }}
			@if ($errors->has('major'))
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style='color: red;'></span>
				<span class="sr-only">Error:</span>
			@else
				<span class='glyphicon glyphicon-asterisk small' style='color: red;'></span>
			@endif
			{{ Form::text('minor', '',
				array('class' => 'form-control', 'id' =>'focusedInput', 'placeholder'=>'Your Minor or ASI? (optional)')) }}

		</div>
		<br>
		<div class="container-fluid" id="push"></div>
		<div class="form-group">
			<br>
			<div class="">
				<span class="glyphicon glyphicon-question-sign"></span>
				{{ Form::label('Project Choices:') }} 
			</div>				
			<p class="small">
				Please select from all teams and projects Which you would most like to work
				on in decending order.
			</p>
			<div class='input-group'>
				1)
				{{ Form::select('firstChoice', array_merge([null => 'Unselected'], $projects_list), null) }}
				@if ($errors->has('major'))
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style='color: red;'></span>
					<span class="sr-only">Error:</span>
				@else
					<span class='glyphicon glyphicon-asterisk small' style='color: red;'></span>
				@endif
				<br>
				<br>
				2)
				{{ Form::select('secondChoice', array_merge([null => 'Unselected'], $projects_list), null) }}
				@if ($errors->has('major'))
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style='color: red;'></span>
					<span class="sr-only">Error:</span>
				@else
					<span class='glyphicon glyphicon-asterisk small' style='color: red;'></span>
				@endif
				<br>
				<br>
				3)
				{{ Form::select('thirdChoice', array_merge([null => 'Unselected'], $projects_list), null) }}
				@if ($errors->has('major'))
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style='color: red;'></span>
					<span class="sr-only">Error:</span>
				@else
					<span class='glyphicon glyphicon-asterisk small' style='color: red;'></span>
				@endif
				<br>
				<br>
				4)
				{{ Form::select('fourthChoice', array_merge([null => 'Unselected'], $projects_list), null) }}
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
						null => 'Unselected',
	   					'project' => 'Project',
	   					'team' => 'Team',
	  					'dontCare' => 'Does Not Matter'
	  					]
				) }}
				@if ($errors->has('major'))
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style='color: red;'></span>
					<span class="sr-only">Error:</span>
				@else
					<span class='glyphicon glyphicon-asterisk small' style='color: red;'></span>
				@endif
			</div>
			<div class="form-group col-sm-6">
				<span class="glyphicon glyphicon-question-sign"></span>
				{{Form::label('Helpful info:')}}
				<p class="small">
					Please share any other experience, skill or goals that might
					be relevant to your project choices. 
				</p>
				{{ Form::textArea('experience') }}
			</div>
		</div>
		<div class="container-fluid" id="push"></div>
		<br>

			<span class="glyphicon glyphicon-ok-sign"></span>
			{{ Form::label('People I want to work with:') }}
			<div class='input-group'>
				{{ Form::text('work_with', '', 
					array('class' => 'form-control', 'id' =>'focusedInput', 'placeholder'=>'Who would you like to work with?')) }}
				<div class='input-group-btn'>
					<a class="btn btn-default" href="#">
						<span class='glyphicon glyphicon-plus'></span>
						<span class="glyphicon glyphicon-user"></span>
					</a>
				</div>
			</div>
			<br>
			<span class="glyphicon glyphicon-remove-sign"></span>
			{{ Form::label('People I don\'t want to work with:') }} 
			<div class='input-group'>
				{{ Form::text('unworkable', "", 
					array('class' => 'form-control', 'id' =>'focusedInput', 'placeholder'=>'Who would you perfer not to work with?')) }}
				<div class='input-group-btn'>
					<a class="btn btn-default" href="#">
						<span class='glyphicon glyphicon-plus'></span>
						<span class="glyphicon glyphicon-user"></span>
					</a>
				</div>
			</div>
			<br>
			{{ Form::hidden('user_id', Auth::user()->id) }}

		<div class='form-group col-lg-12'>
			<p>
				<span class='glyphicon glyphicon-asterisk small' style='color: red;'></span>
				Denotes a required field
			</p>
		</div>

		{{Form::hidden('user_id', Auth::user()->id)}}


		{{Form::submit("Save Preferences", array("class"=>"btn btn-default"))}}

		{{ Form::close() }}

		<br>
@stop