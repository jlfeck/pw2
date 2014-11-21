<?php 
include('header.php'); 
include('src/Post.php');
?>

  <!-- Feed -->
  <div class="col-12 feed">
      <?php 

      if(Session::isLogged()): 

      $Post = new Post();
      $posts = $Post->listPostsByUser($_SESSION['currentId']);

      foreach ($posts as $post):
      ?>
      <div class="post">
        <ul class="nav-post">
          <li><a class="btn-default" href="post_edit.php?id=<?php echo $post->id; ?>"><span class="icon icon-edit"></span></a></li>
          <li><a class="btn-danger" href="#"><span class="icon icon-delete"></span></a></li>
        </ul>
        <h2 class="title-pw"><?php echo $post->title; ?></h2>
        <p><?php echo $_SESSION['currentName']; ?></p>
        <div class="content">
          <?php echo $post->content; ?>
        </div>
      </div>


      <?php endforeach; else: ?>
      
      <?php
      $Post = new Post();
      $posts = $Post->listAllPosts();

      foreach ($posts as $post):

      
      ?>


      <div class="post">
        <h2 class="title-pw"><?php echo $post->title; ?></h2>
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

      <?php endforeach; endif; ?>

  </div>

<?php include('footer.php'); ?>