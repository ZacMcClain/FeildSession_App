@extends ('master')

@section('header')

	<h2>All Genorated Teams:</h2>

@stop

@section('content')

	<p>
		No teams have been genorated yet. Go to The 
		<a href="{{URL::to('admin_index')}}">Admin Veiw</a>
		for more information.
	</p>

@stop