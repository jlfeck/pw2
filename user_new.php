<?php
@session_start();
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

	$result = $User->insertUser();
	$_SESSION['msg'] = $result['msg'];

	header("Location: " . $result['route']);
	exit;
}
?>
<?php 
include('header.php');

	if (!Session::isLogged()): 

?>
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
<form class="user" method="POST" action="user_new.php">
  <input class="form-pw" type="text" name="name" placeholder="Nome">
  <input class="form-pw" type="text" name="user" placeholder="usuário">
  <input class="form-pw" type="password" name="pass" placeholder="senha">
  <input class="form-pw" type="text" name="email" placeholder="E-mail">
  <button class="btn btn-sucess push-left" type="submit">Cadastrar</button>
</form>

</div>
<?php else: ?>

	<div class="col-12">
		<div class="alert-login">Você já está logado</div>
	</div>

<?php
endif; 
include('footer.php'); 
?>