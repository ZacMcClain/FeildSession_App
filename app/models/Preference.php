<?php

class Preference extends Eloquent
{
	public $timestamps = false;
	protected $fillable = array(
								'major',
								'minor',
								'firstChoice',
								'secondChoice',
								'thirdChoice',
								'fourthChoice',
								'mostImportant',
								'experience',
								'user_id'
							);

	public function user()
	{
		return $this->belongsTo('User');
	}
}

?>