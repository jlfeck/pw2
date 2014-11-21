<?php
session_start();
include('src/Post.php');

$Post = new Post();

$id = $_GET['id'];

$result = $Post->loadPost($id);

if (!empty($_POST)) {
	$data = $_POST;
	
	$id = $data['id'];
	$title = $data['title'];
	$content = $data['content'];

	$Post = new Post();

	$Post->setTitle($title);
	$Post->setContent($content);

	$result = $Post->updatePost($id);

	$_SESSION['msg'] = $result['msg'];

	header("Location: ". $result['route'].$id );
	exit;
}
?>
<?php include('header.php'); ?>
<?php if (Session::isLogged()): ?>
<div class="offset-2 col-8">
<!-- post -->
<?php
	if (!empty($_SESSION["msg"])) {
		$msg = $_SESSION['msg'];
		echo '<div class="alert">'.$msg.'</div>';
		unset($_SESSION['msg']);
	}
?>
<?php if ($result->id_user == $_SESSION['currentId']): ?>
<div class="form-header">Post</div>
<form method="POST" action="post_edit.php">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<input class="form-pw" type="text" name="title" placeholder="Título" value="<?php echo $result->title; ?>">
	<textarea class="form-pw" name="content" placeholder="Conteúdo" rows="5" ><?php echo $result->content; ?></textarea>
	<input type="hidden" name="id_user" value="<?php echo $result->id_user; ?>">
	<button class="btn btn-sucess" type="submit">Salvar</button>
</form>
<?php else: ?>

	<div class="col-12">
		<div class="alert-login">Você não tem permissão para editar este post</div>
	</div>

<?php endif; ?>
</div>

<?php else: ?>

	<div class="col-12">
		<div class="alert-login">Você precisa estar logado para postar</div>
	</div>

<?php
endif;

include('footer.php');
?>