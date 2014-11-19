<!DOCTYPE html>
<html lang="en">

	<head>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/journal/bootstrap.min.css" />
		<meta charset="UTF-8">
		<title>Field Session Helper</title>
		<style type="text/css">
			html{
				padding: 1%;
			}
		</style>
	</head>

	<body>

	<nav class="navbar navbar-default" role="navigation" style="padding:5px;">
		<div class="container-fluid"> 
			<ul class="nav nav-pills">
   				<li class="active"><a href="{{URL::to('home')}}"><span class = "glyphicon glyphicon-home"></span> Home</a></li>
    			<li><a href="#">Projects</a></li>
    			<li><a href="#">Forms</a></li>
    			@if(Auth::check())
    				<li class="pull-right"><a class="btn btn-info" href="{{URL::to('logout?_token='.csrf_token())}}">Log Out</a></li>
    				<li class="pull-right">Logged in as <strong>{{Auth::user() -> firstName}} {{Auth::user() -> lastName}}  </li>
    				
    			@else
    				<li class="pull-right"><a class="btn btn-info" href="{{URL::to('login')}}">Log In</a></li>
    			@endif
  			</ul>
		</div>
	</nav>

		<div class="container">
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


