<?php

include('src/User.php');
include('src/Session.php');

$user = new User();

if (!empty($_POST)) {
	$data = $_POST;
	$currentUser = $user->checkUser($data['user'], $data['pass']);

	if ($currentUser) {
		Session::start($currentUser->user);
	
		var_dump($_SESSION);
	}
}

var_dump($_SESSION);