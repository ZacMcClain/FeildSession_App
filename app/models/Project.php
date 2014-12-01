<?php

class Project extends Eloquent{

	protected $fillable = array('company', 'title', 'min', 'max', 'team_id');

	public function team(){
		return $this->belongsTo('Team');
	}

	public function sayWho()
	{
		return $this->company;
	}

	public function sayWhat($id)
	{
		return $this->title;
	}

}

?>