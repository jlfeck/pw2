<?php
include('src/User.php');

$User = new User();

$id_user = $_GET['id'];

$result = $User->loadUser($id_user);


if (!empty($_POST)) {
	$data = $_POST;

	$id = $data['id'];
	$name = $data['name'];
	$email = $data['email'];
	$user = $data['user'];
	$pass = $data['pass'];

	$User->setId($id);
	$User->setUser($user);
	$User->setPass($pass);
	$User->setName($name);
	$User->setEmail($email);

	$User->updateUser($id);

	header("Location: user_edit.php?id=".$id);
}
?>
<?php include('header.php'); ?>
<div class="offset-4 col-4 offset-mobile-2 col-mobile-8">
<!-- user -->
	<?php
		if (!empty($_SESSION["msg"])) {
			$msg = $_SESSION['msg'];
			echo '<div class="alert">'.$msg.'</div>';
			unset($_SESSION['msg']);
		}
	?>
<div class="form-header">Usuário</div>
<form method="POST" action="user_edit.php">
  <input type="hidden" name="id" value="<?php echo $id_user; ?>">
  <input class="form-pw" type="text" name="name" placeholder="Nome" value="<?php echo $result->name; ?>">
  <input class="form-pw" type="text" name="user" placeholder="usuário" value="<?php echo $result->user; ?>">
  <input class="form-pw" type="password" name="pass" placeholder="senha" value="<?php echo $result->pass; ?>">
  <input class="form-pw" type="text" name="email" placeholder="E-mail" value="<?php echo $result->email; ?>">
  <button class="btn btn-sucess" type="submit">Salvar</button>
</form>

</div>

<?php include('footer.php'); ?>