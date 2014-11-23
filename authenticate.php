<?php

include('src/Session.php');
include('src/User.php');

$user = new User();

if (!empty($_POST)) {
	$data = $_POST;
	
	$currentUser = $user->checkUser($data['user'], $data['pass']);

	if ($currentUser) {

		$data = array(
			'currentId' => $currentUser->id,
			'currentUser' => $currentUser->user,
			'currentName' => $currentUser->name
		);
		Session::start($data);
		header("Location: index.php");


	} else {
		$_SESSION['msg'] = 'Usuário ou senha inválidos';
		header("Location: login.php");
	}
}