<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	
	protected $table = 'users';

	public $timestamps = true;	

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	protected $hidden = array('remember_token');

	protected $fillable = array('firstName', 'lastName', 'CWID', 'email', 'preference_id');

	public function canSee(Preference $preference) // used to hide elements from non-admin users
	{
		return $this->is_admin or $this->owns($preference);
	}

	public function preference() // used to make a connection between users and books
	{
		return $this->hasOne('Preference');
	}

	public function owns(Preference $preference)
	{
		return ($this->id) == ($preference->user_id);
	}

	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}
}
