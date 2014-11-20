<?php include('header.php'); ?>
	<!-- login -->
	<div class="offset-4 col-4 offset-mobile-2 col-mobile-8 login">

		<div class="msg">
			<?php echo $msg; ?>
		</div>

	  <div class="form-header">Logar</div>
	  <form method="POST" action="authenticate.php">
	    <input class="form-pw" type="text" name="user" placeholder="usuário">
	    <input class="form-pw" type="password" name="pass" placeholder="senha">
	    <button class="btn btn-sucess push-left" type="submit">Logar</button>
	  </form>

	  <a class="push-right" href="user_new.php">&rarr; Cadastre-se</a>

	</div>

<?php include('footer.php'); ?>