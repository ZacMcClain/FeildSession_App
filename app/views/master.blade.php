<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<style type="text/css">
			body{
				padding: 4%;
			}
		</style>
		<title>Field Session Helper</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/journal/bootstrap.min.css" />
	</head>


	<body>
		<div class="container">

		<div class="container">
		
			<div class="text-right">
				@if(Auth::check())
					<a href="{{URL::to('home')}}" class = "pull-left"> <= Index</a>
					Logged in as <strong>{{Auth::user() -> firstName}} {{Auth::user() -> lastName}}</strong>   |
					<a href="{{URL::to('logout?_token='.csrf_token())}}" class = "btn btn-primary pull-right">Log out</a>
					<br>
					
				@else
					<a href="{{URL::to('login')}}" class = "btn btn-primary pull-right">Log in</a>
				@endif
				
			</div>
		</div>

			<div class="page-header"> 
				@yield('header')
			</div>

			@if(Session::has('message'))
				<div class="alert alert-success">
					{{Session::get('message')}}
				</div>
			@endif
			
			@if(Session::has('error'))
				<div class="alert alert-warning">
					{{Session::get('error')}}
				</div>
			@endif		
		
			@yield('content')
			</div>
		</div>
	</body>
</html>


