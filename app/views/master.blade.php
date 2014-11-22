<!DOCTYPE html>
<html lang="en">

	<head>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/journal/bootstrap.min.css" />
		<!-- <script type="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
		<title>Field Session Helper</title>
		<style type="text/css">
			* {
    			margin: 0;
			}
			html, body {
    			height: 100%;
			}
			#masthead{
				display:block;
				background: #FA812A url('img/m-banner.jpg') no-repeat;
			}
			#mines_logo{
				display: block;
				margin-left: 4%;
				margin-right: auto;
			}
			#main-content{
				padding: 0.22%;
				min-height: 100%;
    			height: auto !important;
    			height: 100%;
    			margin: 0 auto -54px;
			}
			#push{
				height: 4px;
				background-color: black;
			}
			.buffer{
				height: 54px
			}
			#footer{
    			height: 50px;
    			background: #FCAA6F url('img/m-banner-small.jpg') no-repeat center;
			}

		</style>
	</head>

	<body>
		<div class="container-fluid" id="push"></div>
		<div class="container-fluid" id="masthead">
			{{ HTML::image('img/Logo_ColoradoMines.png', 'Logo', array('id' => 'mines_logo')) }}
		</div>
		<div class="container-fluid" id="push"></div>
		<div id="main-content">
			<nav class="navbar navbar-default" role="navigation" style="padding:5px;">
				<div class="container-fluid"> 
					<ul class="nav nav-pills">
						<li class="active"><a href="{{URL::to('home')}}"><span class = "glyphicon glyphicon-home"></span> Home</a></li>
						<li><a href="{{URL::to('projects')}}">Projects</a></li>
		    			@if(Auth::check())   			
		    				@if((Auth::user()->isAdmin()))
			    				<li><a href="{{URL::to('admin_index')}}">Admin View</a></li>
			    			@else
			    				<li><a href="{{URL::to('students/'.Auth::user()->id)}}">My Profile</a></li>
			    				<li><a href="{{URL::to('app_form')}}">Forms</a></li>
			    				<li><a href="{{URL::to('my_team')}}">Your Team</a></li>
			    			@endif
		    				<li class="pull-right"><a class="btn btn-info" href="{{ URL::to('logout?_token='.csrf_token()) }}">Log Out</a></li>
		    				<li class="pull-right" style='padding-right: 5px;'>
		    					Hello <strong><u>{{Auth::user() -> firstName}} {{Auth::user() -> lastName}}</u></strong>
		    				</li>			
		    			@else
		    				<li class="pull-right"><a class="btn btn-info" href="{{URL::to('login')}}">Log In</a></li>
		    				<li class="pull-right" style='padding-right: 5px;'>
		    					Log In to see more!
		    				</li>
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
			<div class="buffer"></div>
		</div>			
		<div class="container-fluid" id="push"></div>
		<div class="container-fluid" id="footer">
			<p class="small">Copyright <span class="glyphicon glyphicon-copyright-mark"></span> 2014</p>
		</div>
	</body>
</html>


