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
			{{ Form::select('firstChoice', [
   					'project_1' => 'Titel 1',
   					'project_2' => 'Titel 2',
  					'pr0ject_3' => 'Titel 3']
			) }}
			<br>

			{{Form::label('Second Choice:')}} 
			{{ Form::select('secondChoice', [
   					'project_1' => 'Titel 1',
   					'project_2' => 'Titel 2',
  					'pr0ject_3' => 'Titel 3']
			) }}
			<br>

			{{Form::label('Third Choice:')}} 
			{{ Form::select('thirdChoice', [
   					'project_1' => 'Titel 1',
   					'project_2' => 'Titel 2',
  					'pr0ject_3' => 'Titel 3']
			) }}
			<br>

			{{Form::label('Fourth Choice:')}} 
			{{ Form::select('fourthChoice', [
   					'project_1' => 'Titel 1',
   					'project_2' => 'Titel 2',
  					'pr0ject_3' => 'Titel 3']
			) }}
		</div>

		<div class="form-group">
			{{Form::label('Perferred Teammate(s):')}}
			{{Form::text('pref_1')}}
		</div>

		<div class="form-group">
			{{Form::label('Not Perferred Teammate(s):')}} 
			{{Form::text('unpref_1')}}
		</div>

		{{Form::submit("Submin", array("class"=>"btn btn-default"))}}
	{{Form::close()}}
</div>

@stop