@extends ('master')

@section('header')

	<h2>All Generated Teams</h2>

@stop

@section('content')

	<p>
		No teams have been generated yet. Go to the 
		<a href="{{URL::to('admin_index')}}">Admin Veiw</a>
		for more information.
	</p>

@stop