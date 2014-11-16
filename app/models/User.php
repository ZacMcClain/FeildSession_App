<?php
use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface {

	protected $fillable = array('lastName', 'firstName', 'CWID', 'email', 'password', 'is_admin');

	public function getAuthPassword() {
		return $this->password;
	}

	public function getAuthIdentifier() {
		return $this->getKey();
	}
}

?>
