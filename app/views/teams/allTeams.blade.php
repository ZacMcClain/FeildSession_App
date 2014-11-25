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
						if($pref->firstChoice == $project->id && $count < $project->max) {
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
						array('project_id' => $project->id, 
						'person1_id' => $members[0], 
						'person2_id' => $members[1], 
						'person3_id' => $members[2], 
						'person4_id' => $members[3], 
						'person5_id' => $members[4],
						'person6_id' => $members[5]
					)); }}

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
				
				echo '<tr>
					<td>'.$proj->title.'</td>
					<td>'.$team->person1_id.'</td>
					<td>'.$team->person2_id.'</td>
					<td>'.$team->person3_id.'</td>
					<td>'.$team->person4_id.'</td>
					<td>'.$team->person5_id.'</td>
					<td>'.$team->person6_id.'</td>
				</tr> ';
			}
			echo '</tbody>
		</table>
		</div> ';
	}
?>
@stop