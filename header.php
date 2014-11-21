<?php include('src/Session.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PW 2 Blog</title>

    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="nav-fixed-top">
      <div class="wrap">
        <div class="line">
        	<div class="col-12">
    			<div class="logo-pw">
    				<span class="logo">*</span><span class="pw">PW 2</span>
    			</div>
    			<nav class="nav">
    				<ul>
    				  <li><a href="index.php">Página inicial</a></li>
    				  <?php if(isset($_SESSION) and !Session::isLogged()): ?>
    					  <li><a href="login.php">Entrar</a></li>
    				  <?php else: ?>
    					  <li><a href="post_new.php">Postar</a></li>

    					  <?php echo '<li><a href="user_edit.php?id='.$_SESSION['currentId'].'">'.$_SESSION['currentUser'].'</a></li>'; ?>

    					  <li><a href="logout.php">Sair</a></li>
    				  <?php endif; ?>
    				</ul>
    			</nav>
        	</div>
        </div>
      </div>
    </div>

    <div class="clear"></div>

    <div class="wrap container">
    	<div class="line">