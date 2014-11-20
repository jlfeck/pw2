<?php
session_start();

class Session
{

	public static function start($data = array())
	{	
		if (!empty($data)) {
			$_SESSION['currentId'] = $data['currentId'];
			$_SESSION['currentUser'] = $data['currentUser'];
			$_SESSION['currentName'] = $data['currentName'];
		} else {
			session_unset();
		}
	}

	public static function isLogged()
	{
		return ($_SESSION['currentUser']) ? true : false ;
	}

	public static function logout()
	{	
		// $_SESSION['userCurrent'] = null;
		session_unset();
		session_destroy();
		header("Location: index.php");
	}

}