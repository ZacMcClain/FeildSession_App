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
					<th>Member 2</th>';
					if ($myTeam->person3_id != -1)
						echo '<th>Member 3</th>';
					if ($myTeam->person4_id != -1)
						echo '<th>Member 4</th>';
					if ($myTeam->person5_id != -1)
						echo '<th>Member 5</th>';
					if ($myTeam->person6_id != -1)
						echo '<th>Member 6</th>';
				echo '</tr>
			</thead>
			<tbody>';
				$proj = DB::table('projects')->where('id', '=', $myTeam->project_id)->first();
				
				if($myTeam->person1_id != -1){
					$teammate1 = $users->find($myTeam->person1_id)['firstName'] . " " . $users->find($myTeam->person1_id)['lastName'];
				} else {
					$teammate1 = "-------";
				}

				if($myTeam->person2_id != -1){
					$teammate2 = $users->find($myTeam->person2_id)['firstName'] . " " . $users->find($myTeam->person2_id)['lastName'];
				} else {
					$teammate2 = "-------";
				}

				if($myTeam->person3_id != -1){
					$teammate3 = $users->find($myTeam->person3_id)['firstName'] . " " . $users->find($myTeam->person3_id)['lastName'];
				} else {
					$teammate3 = "-------";
				}

				if($myTeam->person4_id != -1){
					$teammate4 = $users->find($myTeam->person4_id)['firstName']  . " " . $users->find($myTeam->person4_id)['lastName'];
				} else {
					$teammate4 = "-------";
				}

				if($myTeam->person5_id != -1){
					$teammate5 = $users->find($myTeam->person5_id)['firstName']  . " " . $users->find($myTeam->person5_id)['lastName'];
				} else {
					$teammate5 = "-------";
				}

				if($myTeam->person6_id != -1){
					$teammate6 = $users->find($myTeam->person6_id)['firstName']  . " " . $users->find($myTeam->person6_id)['lastName'];
				} else {
					$teammate6 = "-------";
				}

				echo '<tr>';
				echo '<td>' . $proj->title . '</td>';
				echo '<td>' . $teammate1 . '</td>';
				echo '<td>' . $teammate2 . '</td>';
				if ($myTeam->person3_id != -1)
					echo '<td>' . $teammate3 . '</td>';
				if ($myTeam->person4_id != -1)
					echo '<td>' . $teammate4 . '</td>';
				if ($myTeam->person5_id != -1)
					echo '<td>' . $teammate5 . '</td>';
				if ($myTeam->person6_id != -1)
					echo '<td>' . $teammate6 . '</td>';
				echo '</tr>';
			echo '</tbody>
		</table>
		</div> ';
	}
	?>

	<p>If you have any questions or concerns about your team, email your admin.</p>
	{{ HTML::mailto('admin@mines.edu', 'Email Admin') }}

@stop