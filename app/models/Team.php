<?php

class Team extends Eloquent
{
	public $timestamps = false;
	protected $fillable = array(
								'project_id',
								'person1_id',
								'person2_id',
								'person3_id',
								'person4_id',
								'person5_id',
								'person6_id'
							);

	public function project()
	{
		return $this->belongsTo('Project');
	}

	public function person() // not used
	{
		return $this->belongsToMany('User');
	}
}

?>