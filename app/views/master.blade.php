<!DOCTYPE html>
<html lang="en">

	<head>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/journal/bootstrap.min.css" />
		<!-- <script type="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
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
    			<li><a href="{{URL::to('projects')}}">Projects</a></li>
    			<li><a href="{{URL::to('app_form')}}">Forms</a></li>
    			@if (Auth::check() and Auth::user()->canSee())
    				<li><a href="#">Admin View</a></li>
    			@endif
    			@if(Auth::check())
    				<li class="pull-right"><a class="btn btn-info" href="{{URL::to('logout?_token='.csrf_token())}}">Log Out</a></li>
    				<li class="pull-right" style='padding-right: 5px;'>Hello <strong>{{Auth::user() -> firstName}} {{Auth::user() -> lastName}}</li>
    				
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


