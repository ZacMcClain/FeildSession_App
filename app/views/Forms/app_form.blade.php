@extends('master')

@section('header')
<h2>
	Project Selection form:
</h2>
@stop

@section('content')

<div class="container">

	{{Form::model($preference, array('method'=> '$method', 'url' => 'teams_form')) }}
		
		<div class="input-group">
			<span class="glyphicon glyphicon-info-sign"></span>
			{{ Form::label('Major, Minor/Asi:') }}

			{{ Form::text('major', '',
				array('class' => 'form-control', 'id' =>'focusedInput', 'placeholder'=>'Your Major? (Required)')) }}
			<span class='glyphicon glyphicon-asterisk small' style='color: red;'></span>
			{{ Form::text('minor', '',
				array('class' => 'form-control', 'id' =>'focusedInput', 'placeholder'=>'Your Minor or ASI? (optional)')) }}
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
				{{ Form::select('firstChoice', array_merge(['Unselected'], $projects_list), 1) }}
				<span class='glyphicon glyphicon-asterisk small' style='color: red;'></span>
				<br>
				<br>
				2)
				{{ Form::select('secondChoice', array_merge(['Unselected'], $projects_list), 1) }}
				<span class='glyphicon glyphicon-asterisk small' style='color: red;'></span>
				<br>
				<br>
				3)
				{{ Form::select('thirdChoice', array_merge(['Unselected'], $projects_list), 1) }}
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
				{{Form::label('Matters Most:')}}
				<p class="small">
					When selecting teams what matters more to you?
				</p>
				{{ Form::select('mostImportant', 
						[
						'null' => 'Unselected',
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
				Denotes a required feild
			</p>
				{{Form::submit("Save and Continue", array("class"=>"btn btn-default"))}}
		</div>
	{{Form::close()}}
	<br>
	<br>
</div>

@stop