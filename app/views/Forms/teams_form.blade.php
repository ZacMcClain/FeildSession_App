@extends('master')

@section('header')
<h2>
	Project Selection form:
</h2>
@stop

@section('content')

<div class="container">
	{{-- 
	{{ Form::model($teams, array('method'=> '$method', 'url' => 'students/'.$user->id)) }}
	--}}
	{{ Form::open() }}

		<div class="form-group">
			<span class="glyphicon glyphicon-ok-sign"></span>
			{{ Form::label('Perferred Teammate(s):') }}
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
			{{ Form::label('Unworkable Teammate(s):') }} 
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
		</div>

	{{ Form::close() }}
</div>

@stop