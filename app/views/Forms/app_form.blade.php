@extends('master')

@section('header')
<h2>
	CSCI Field Session Index
</h2>
@stop

@section('content')

<div class="container">
	{{Form::model($preference, array('method'=> '$method', 'url' => 'students/'.$user->id)) }}
		<div class="input-group">

			{{ Form::label('Major, Minor/Asi:') }}
			{{ Form::text('major', '',
				array('class' => 'form-control', 'id' =>'focusedInput', 'placeholder'=>'Your Major?')) }}

			{{ Form::text('minor', '',
				array('class' => 'form-control', 'id' =>'focusedInput', 'placeholder'=>'Your Minor or ASI?')) }}
		</div>

		<div class="form-group">
			<div class="info">
				<p class="small">
					Please select from all teams and projects Which you would most like to work
					on in decending order.
				</p>
			</div>

			{{Form::label('First Choice:   ')}} 
			{{Form::select('firstChoice')}}
			<br>

			{{Form::label('Second Choice:')}} 
			{{ Form::select('secondChoice', 
				[
					'null' => 'Unselected',
   					'project_1' => 'Titel 1',
   					'project_2' => 'Titel 2',
  					'project_3' => 'Titel 3'
  				]
			) }}
			<br>

			{{Form::label('Third Choice:  ')}} 
			{{ Form::select('thirdChoice', 
				[
					'null' => 'Unselected',
   					'project_1' => 'Titel 1',
   					'project_2' => 'Titel 2',
  					'project_3' => 'Titel 3'
  				]
			) }}
			<br>

			{{Form::label('Fourth Choice: ')}} 
			{{ Form::select('fourthChoice', 
				[
					'null' => 'Unselected',
   					'project_1' => 'Titel 1',
   					'project_2' => 'Titel 2',
  					'project_3' => 'Titel 3'
  				]
			) }}
		</div>

		<div class="form-group col-md-6">
			{{ Form::label('Perferred Teammate(s):') }}
			{{ Form::text('work_with', '', 
				array('class' => 'form-control', 'id' =>'focusedInput', 'placeholder'=>'Who would you like to work with?')) }}
			<br>
			{{ Form::label('Unworkable Teammate(s):') }} 
			{{ Form::text('unworkable', "", 
				array('class' => 'form-control', 'id' =>'focusedInput', 'placeholder'=>'Who would you perfer not to work with?')) }}
		</div>

		<div class="form-group">
			{{Form::label('Helpful info:')}}
			<p class="small">
				Please share any other experience, skill or goals that might
				be relevant to your project choices. 
			</p>
			{{Form::textArea('experience')}}
		</div>

		<div class="form-group">
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
		</div>

		{{Form::submit("Submin", array("class"=>"btn btn-default"))}}

	{{Form::close()}}
	<br>
	<br>
</div>

@stop