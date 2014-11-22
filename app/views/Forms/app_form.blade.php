@extends('master')

@section('header')
<h2>
	CSCI Field Session Index
</h2>
@stop

@section('content')

<div class="container">
	{{Form::open()}}
		<div class="form-group">
			{{Form::label('Major')}} 
			{{Form::text('major')}}

			{{Form::label(' Minor/Asi')}} 
			{{Form::text('minor')}}
		</div>

		<div class="form-group">
			{{Form::label('First Choice:')}} 
			{{Form::select('firstChoice', 
				[
					'null' => 'Unselected',
   					'project_1' => 'Titel 1',
   					'project_2' => 'Titel 2',
  					'project_3' => 'Titel 3'
  				]
			) }}
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

			{{Form::label('Third Choice:')}} 
			{{ Form::select('thirdChoice', 
				[
					'null' => 'Unselected',
   					'project_1' => 'Titel 1',
   					'project_2' => 'Titel 2',
  					'project_3' => 'Titel 3'
  				]
			) }}
			<br>

			{{Form::label('Fourth Choice:')}} 
			{{ Form::select('fourthChoice', 
				[
					'null' => 'Unselected',
   					'project_1' => 'Titel 1',
   					'project_2' => 'Titel 2',
  					'project_3' => 'Titel 3'
  				]
			) }}
		</div>

		<div class="form-group">
			{{Form::label('Perferred Teammate(s):')}}
			{{Form::text('pref_1')}}
			<br>
			{{Form::label('Not Perferred Teammate(s):')}} 
			{{Form::text('unpref_1')}}
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
</div>

@stop