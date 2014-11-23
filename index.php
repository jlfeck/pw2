<?php 
include('header.php'); 
include('src/User.php');
include('src/Post.php');
?>

  <!-- Feed -->
  <div class="col-12 feed">
      <?php
  
      if (!empty($_SESSION["msg"])) {
        $msg = $_SESSION['msg'];
        echo '<div class="alert">'.$msg.'</div>';
        unset($_SESSION['msg']);
      }

      if(Session::isLogged()): 

      $Post = new Post();
      $posts = $Post->listPostsByUser($_SESSION['currentId']);

      if (empty($posts)):
      ?>

      <div class="col-12">
        <div class="alert-login">Você não tem posts cadastrados!</div>
      </div>

      <?php 
        else:
        foreach ($posts as $post):
      ?>
        <div class="post">
          <ul class="nav-post">
            <li><a class="btn-default" href="post_edit.php?id=<?php echo $post->id; ?>"><span class="icon icon-edit"></span></a></li>
            <li><a class="btn-danger" href="post_delete.php?id=<?php echo $post->id; ?>&id_user=<?php echo $post->id_user; ?>"><span class="icon icon-delete"></span></a></li>
          </ul>
          <h2 class="title-pw"><?php echo $post->title; ?></h2>
          <p><?php echo $_SESSION['currentName']; ?></p>
          <div class="content">
            <?php echo $post->content; ?>
          </div>
        </div>

      <?php endforeach; endif; else: ?>
      
      <?php
      $Post = new Post();
      $User = new User();
      $posts = $Post->listAllPosts();
      
      if (empty($posts)):
      ?>

      <div class="col-12">
        <div class="alert-login">
          Não existe posts cadastrados! <a href="user_new.php">Cadastre-se</a> e post agora mesmo!
        </div>
      </div>

      <?php 
      else:
      foreach ($posts as $post):

      $author = $User->loadUser($post->id_user);
      ?>

      <div class="post">
        <h2 class="title-pw"><?php echo $post->title; ?></h2>
        <p><?php echo $author->name; ?></p>
        <div class="content">
          <?php echo $post->content; ?>
        </div>
      </div>

      <?php endforeach;  endif; endif; ?>

  </div>

<?php include('footer.php'); ?>