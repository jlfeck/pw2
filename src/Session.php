<?php

/**
* 
*/
class Session
{

	public static function start($user)
	{
		$_SESSION['userCurrent'] = $user;
	}

	public static function logout()
	{
		$_SESSION['userCurrent'] = null;
		session_destroy();
	}
}