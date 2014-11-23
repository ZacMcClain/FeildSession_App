<?php

class Teammate extends Eloquent
{
	public $timestamps = false;
	protected $fillable = array(
								'person1_id',
								'person2_id',
								'want_to_work_with'
							);

	public function person1()
	{
		return $this->belongsTo('User');
	}

		public function person2()
	{
		return $this->belongsTo('User');
	}
}

?>