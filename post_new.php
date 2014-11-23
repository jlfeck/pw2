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
?>
<?php include('header.php'); ?>
<?php if (Session::isLogged()): ?>
<div class="offset-2 col-8">
<!-- post -->
  
  <div class="form-header">Post</div>
  <form class="post" method="POST" action="post_new.php" id="form">
    <input class="form-pw" type="text" name="title" placeholder="Título">
    <textarea class="form-pw" name="content" placeholder="Conteúdo" rows="5"></textarea>
    <input type="hidden" name="id_user" value="<?php echo $_SESSION['currentId']; ?>">
    <button class="btn btn-sucess push-left" id="botao" type="submit">Postar</button>
  </form>

</div>

<?php else: ?>

	<div class="col-12">
		<div class="alert-login">Você precisa estar logado para postar</div>
	</div>

<?php
endif;

include('footer.php');
?>