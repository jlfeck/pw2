<?php
@session_start();

class Session
{
	// cadastra o usuário na sessão
	public static function start($data = array())
	{	
		if (!empty($data)) {
			$_SESSION['currentId'] = (isset($data['currentId'])) ? $data['currentId'] : '' ;
			$_SESSION['currentUser'] = (isset($data['currentUser'])) ? $data['currentUser'] : '' ;
			$_SESSION['currentName'] = (isset($data['currentName'])) ? $data['currentName'] : '' ;
		} else {
			session_unset();
		}
	}
	// verifica se o usuário está logado
	public static function isLogged()
	{
		return (isset($_SESSION['currentUser'])) ? true : false ;
	}
	// limpa a sessão
	public static function logout()
	{	
		session_unset();
		session_destroy();
		header("Location: index.php");
	}

}