<nav>
  <ul>
	<?php
       if (isset($_SESSION['username'])) {
         include ('templates/logout_form.php');?>
	   <li><a href="edit_user.php">Edit User</a></li>
	   <li><a href="see_user.php">User</a></li>
	<?php   }
       else
         //include ('templates/login_form.php');
	?>
    <div id="Buttons">
       <li><a href="list_restaurants.php">Restaurants</a></li>
    <?php if (!isset($_SESSION['username'])) { ?>
         <li><a href="register.php">Register</a></li>
         <li><a href="logInPage.php">Log in</a></li>
      </div>
    <?php } ?>
  </ul>
</nav>
