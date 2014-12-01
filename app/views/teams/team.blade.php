@extends('master')

@section('header')
<h2>Team Information</h2>
@stop

@section('content')
<?php

	{{ $teams = DB::table('team')->get(); }}

		$myTeam_id = -1;
		$myTeam = null;

	if(!empty($teams)) {
		foreach($teams as $team) {
			if($team->person1_id == Auth::user()->id || 
			$team->person2_id == Auth::user()->id ||
			$team->person3_id == Auth::user()->id ||
			$team->person4_id == Auth::user()->id ||
			$team->person5_id == Auth::user()->id ||
			$team->person6_id == Auth::user()->id) {
				$myTeam_id = $team->id;
				$myTeam = $team;
			}
		}
	}

	if($myTeam_id < 0) {
		echo '<p> You haven\'t generated any teams yet. </p>';
	} 
	else {
		echo'<div class="group col-md-12">
		<h3> Your Team: </h3>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Project</th>
					<th>Member 1</th>
					<th>Member 2</th>
					<th>Member 3</th>
					<th>Member 4</th>
					<th>Member 5</th>
					<th>Member 6</th>
				</tr>
			</thead>
			<tbody>';
				$proj = DB::table('projects')->where('id', '=', $myTeam->project_id)->first();
				
				echo '<tr>
					<td>'.$proj->title.'</td>
					<td>'.$myTeam->person1_id.'</td>
					<td>'.$myTeam->person2_id.'</td>
					<td>'.$myTeam->person3_id.'</td>
					<td>'.$myTeam->person4_id.'</td>
					<td>'.$myTeam->person5_id.'</td>
					<td>'.$myTeam->person6_id.'</td>
				</tr> ';
			echo '</tbody>
		</table>
		</div> ';
	}
	?>

	<p>If you have any questions or concerns about your team, email your admin.</p>
	{{ HTML::mailto('admin@mines.edu', 'Email Admin') }}

@stop