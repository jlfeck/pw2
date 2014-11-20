<?php include('header.php'); ?>

  <!-- Feed -->
  <div class="col-12 feed">
    <div class="post">
      <?php if(Session::isLogged()): ?>
        <ul class="nav-post">
          <li><a class="btn-default" href="#"><span class="icon icon-edit"></span></a></li>
          <li><a class="btn-danger" href="#"><span class="icon icon-delete"></span></a></li>
        </ul>
      <?php endif; ?>
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

<?php include('footer.php'); ?>