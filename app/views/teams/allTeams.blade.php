@extends ('master')

@section('header')

	<h2>All Generated Teams</h2>

@stop

@section('content')
	<?php
		if($generateTeams == 1){
			DB::table('team')->delete();

			foreach($projects as $project) {
				$members = array_fill(0, 6, -1);
				$count = 0;
				foreach($preferences as $pref) {
					if(in_array($pref->user['id'], $student_pool)) {

						$i = 0; 
						$friends = array();
						foreach($teammates as $teammate) {
							if($teammate->person1_id == $pref->user['id']) {
								array_push($friends, $teammate->person2_id);
							}
						}

						if($pref->firstChoice == $project->id && $count < $project->max) {

							if(!empty($friends)) {
								foreach($friends as $friend) {
									if(in_array($friend, $student_pool)) {
										$i = 0; 
										$their_projects = array();
										foreach($preferences as $their_pref) {
											if($friend == $their_pref->user['id']) {
												array_push($their_projects, $their_pref->firstChoice);
												array_push($their_projects, $their_pref->secondChoice);
												array_push($their_projects, $their_pref->thirdChoice);
												array_push($their_projects, $their_pref->fourthChoice);
											}
										}

										if(in_array($project->id, $their_projects)) {
											$members[$count] = $friend;
											$count++;	
											unset($student_pool[array_search($friend, $student_pool)]);							
										}
									}
								}
							}
							
							$members[$count] = $pref->user['id'];
							$count++;
							unset($student_pool[$pref->user['id']-1]);
						}
					}
				}

					{{ DB::table('team')->insertGetId(
						array('project_id' => $project->id, 
						'person1_id' => $members[0], 
						'person2_id' => $members[1], 
						'person3_id' => $members[2], 
						'person4_id' => $members[3], 
						'person5_id' => $members[4],
						'person6_id' => $members[5]
					)); }}

			}

			if(!empty($student_pool)) {
				foreach($projects as $project) {
				$members = array_fill(0, 6, -1);
				$count = 0;
				foreach($preferences as $pref) {
					if(in_array($pref->user['id'], $student_pool)) {
						if($pref->seconfChoice == $project->id && $count < $project->max) {
							$members[$count] = $pref->user['id'];
							$count++;
							unset($student_pool[$pref->user['id']-1]);
						}
						else if($pref->secondChoice == $project->id && $count < $project->max) {
							$members[$count] = $pref->user['id'];
							$count++;
							unset($student_pool[$pref->user['id']-1]);
						}
						else if($pref->thirdChoice == $project->id && $count < $project->max) {
							$members[$count] = $pref->user['id'];
							$count++;
							unset($student_pool[$pref->user['id']-1]);
						}
					}
				}

					{{ DB::table('team')->insertGetId(
						array(
							'project_id' => $project->id, 
							'person1_id' => $members[0], 
							'person2_id' => $members[1], 
							'person3_id' => $members[2], 
							'person4_id' => $members[3], 
							'person5_id' => $members[4],
							'person6_id' => $members[5]
						)); 
					}}

			}
			}
		}

	 {{ $teams = DB::table('team')->get(); }}

	if(empty($teams)) {
		echo '<p> You haven\'t generated any teams yet. </p>';
	} 
	else {
		echo'<div class="group col-md-12">
		<h3> Teams: </h3>
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

			foreach($teams as $team) {

				$proj = DB::table('projects')->where('id', '=', $team->project_id)->first();

				if($team->person1_id != -1){
					$teammate1 = $users->find($team->person1_id)['firstName'] . " " . $users->find($team->person1_id)['lastName'];
				} else {
					$teammate1 = "-------";
				}

				if($team->person2_id != -1){
					$teammate2 = $users->find($team->person2_id)['firstName'] . " " . $users->find($team->person2_id)['lastName'];
				} else {
					$teammate2 = "-------";
				}

				if($team->person3_id != -1){
					$teammate3 = $users->find($team->person3_id)['firstName'] . " " . $users->find($team->person3_id)['lastName'];
				} else {
					$teammate3 = "-------";
				}

				if($team->person4_id != -1){
					$teammate4 = $users->find($team->person4_id)['firstName']  . " " . $users->find($team->person4_id)['lastName'];
				} else {
					$teammate4 = "-------";
				}

				if($team->person5_id != -1){
					$teammate5 = $users->find($team->person5_id)['firstName']  . " " . $users->find($team->person5_id)['lastName'];
				} else {
					$teammate5 = "-------";
				}

				if($team->person6_id != -1){
					$teammate6 = $users->find($team->person6_id)['firstName']  . " " . $users->find($team->person6_id)['lastName'];
				} else {
					$teammate6 = "-------";
				}

				
				echo '<tr>
					<td>' . $proj->title . '</td>
					<td>' . $teammate1 . '</td>
					<td>' . $teammate2 . '</td>
					<td>' . $teammate3 . '</td>
					<td>' . $teammate4 . '</td>
					<td>' . $teammate5 . '</td>
					<td>' . $teammate6 . '</td>
				</tr> ';
			}
			echo '</tbody>
		</table>
		</div> ';
	}
?>
@stop