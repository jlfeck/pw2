<?php
session_start();
include('src/User.php');
include('src/Post.php');

$User = new User();

$Post = new Post();

$id_user = $_GET['id'];

if ($Post->hasPost($id_user)) {
	$_SESSION['msg'] = 'Usuário não pode ser removido, pois possui posts cadastrados';
	header("Location: user_edit.php?id=".$id_user );

} else {
	$result = $User->deleteUser($id_user);
	$_SESSION['msg'] = $result['msg'];
	
	// Limpa usuário removido da sessão
	$_SESSION['currentId'] = null;
	$_SESSION['currentUser'] = null;
	$_SESSION['currentName'] = null;

	header("Location: ". $result['route'] );
}
