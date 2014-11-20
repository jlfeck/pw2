<?php

include('src/User.php');

if (!empty($_POST)) {
	$data = $_POST;
	
	$name = $data['name'];
	$email = $data['email'];
	$user = $data['user'];
	$pass = $data['pass'];

	$User = new User();

	$User->setUser($user);
	$User->setPass($pass);
	$User->setName($name);
	$User->setEmail($email);

	$User->insertUser();

	header("Location: index.php");

}