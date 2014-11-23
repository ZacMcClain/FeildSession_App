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

	public function person1()
	{
		return $this->belongsTo('User');
	}

	public function person2()
	{
		return $this->belongsTo('User');
	}

	public function person3()
	{
		return $this->belongsTo('User');
	}

	public function person4()
	{
		return $this->belongsTo('User');
	}

	public function person5()
	{
		return $this->belongsTo('User');
	}

	public function person6()
	{
		return $this->belongsTo('User');
	}
}

?>