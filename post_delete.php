<?php
@session_start();
include('src/User.php');
include('src/Post.php');

$Post = new Post();

$id = $_GET['id'];
$id_user = $_GET['id_user'];

if ($id_user == $_SESSION['currentId']) {
	$result = $Post->deletePost($id);
	$_SESSION['msg'] = $result['msg'];
	header("Location: ". $result['route'] );
}