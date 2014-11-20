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
          <div class="logo-pw">
            <span class="logo">*</span><span class="pw">PW 2</span>
          </div>
          <nav class="nav">
            <ul>
              <li><a href="#">Entrar</a></li>
              <li><a href="#">Cadastrar</a></li>
              <li><a href="#">Postar</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>



    <div class="wrap container">


      <div class="line">
        
        <!-- login -->
        <div class="offset-4 col-4 offset-mobile-2 col-mobile-8 login">

          <div class="form-header">Logar</div>
          <form method="POST" action="authenticate.php">
            <input class="form-pw" type="text" name="user" placeholder="usuário">
            <input class="form-pw" type="password" name="pass" placeholder="senha">
            <button class="btn btn-sucess" type="submit">Logar</button>
          </form>
        
        </div>

        <!-- user -->
        <div class="offset-4 col-4 offset-mobile-2 col-mobile-8">
    
          <div class="form-header">Usuário</div>
          <form method="POST" action="user_new.php">
            <input class="form-pw" type="text" name="name" placeholder="Nome">
            <input class="form-pw" type="text" name="user" placeholder="usuário">
            <input class="form-pw" type="password" name="pass" placeholder="senha">
            <input class="form-pw" type="text" name="email" placeholder="E-mail">
            <button class="btn btn-sucess" type="submit">Cadastrar</button>
          </form>

        </div>

        <!-- post -->
        <div class="offset-2 col-8">
          
          <div class="form-header">Post</div>
          <form method="POST" action="post_new.php">
            <input class="form-pw" type="text" name="title" placeholder="Título">
            <textarea class="form-pw" name="content" placeholder="Conteúdo" rows="5"></textarea>
            <input type="hidden" name="id_user">
            <button class="btn btn-sucess" type="submit">Postar</button>
          </form>

        </div>

      </div>

      <!-- Feed -->
      <div class="line">
        <div class="col-12 feed">
          <div class="post">
            <ul class="nav-post">
              <li><a class="btn-default" href="#"><span class="icon icon-edit"></span></a></li>
              <li><a class="btn-danger" href="#"><span class="icon icon-delete"></span></a></li>
            </ul>
            <h2 class="title-pw">Title</h2>
            <p>Autor</p>
            <div class="content">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
          </div>

          <div class="post">
            <ul class="nav-post">
              <li><a class="btn-default" href="#"><span class="icon icon-edit"></span></a></li>
              <li><a class="btn-danger" href="#"><span class="icon icon-delete"></span></a></li>
            </ul>
            <h2 class="title-pw">Title</h2>
            <p>Autor</p>
            <div class="content">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
          </div>
        </div>
        <!-- <div class="col-4 feed">
          side
        </div> -->
      </div>

      <div class="footer">
        João Feck | Jaderson Lima
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>