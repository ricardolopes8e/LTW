<nav>
      <?php
        if (isset($_SESSION['username'])) 
          include ('templates/logout_form.php');
        else    
          include ('templates/login_form.php');
      ?>

      <ul>
        <li><a href="list_categories.php">Categories</a></li>
        <?php if (!isset($_SESSION['username'])) { ?>
          <li><a href="register.php">Register</a></li>
        <?php } ?>
      </ul>
</nav>