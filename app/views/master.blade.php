<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Field Session Helper</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />
</head>
<body>
	<div class="container">
		<div class="page-header"> @yield('header')</div>
			@if(Session::has('message'))
				<div class="alert alert-success">{{Session::get('message')}}</div>
			@endif
			@yield('content')
	</div>
</body>
</html>

