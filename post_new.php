<?php

include('src/Post.php');

if (!empty($_POST)) {
	$data = $_POST;
	
	$id_user = $data['id_user'];
	$title = $data['title'];
	$content = $data['content'];

	$Post = new Post();

	$Post->setIdUser($id_user);
	$Post->setTitle($title);
	$Post->setContent($content);

	$Post->insertPost();

	header("Location: index.php");

}