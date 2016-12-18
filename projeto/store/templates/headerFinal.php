<!DOCTYPE html>
<html>
<head>
  <title>Corner's Food</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    
    <div class="background-wrap">
      <video id="video-bg-elem" preload="auto" autoplay="true" loop="loop" muted="muted">
        <source src="Seq.mp4" type="video/mp4">
          Video not supported
        </video>
      </div>

      <div id="logreg">
<<<<<<< HEAD
        <?php if (isset($_SESSION['username'])) 
        { ?>
        <div id="LogOut-Button">
          <a href="action_logout.php">Log Out</a>
          <a href="edit_user.php">Edit User</a>
          <a href="see_user.php">User</a>
          <a href="add_restaurant.php">Add Restaurant</a>
        </div>
        <?php } 
        ?>
=======
          <?php if (isset($_SESSION['username'])) 
              { ?>
              <div id="LogOut-Button">
                <a href="action_logout.php">Log Out</a>
				<a href="edit_user.php">Edit User</a>
				<a href="see_user.php">User</a>
				<a href="add_restaurant.php">Add Restaurant</a>
              </div>
            <?php } 
          ?>
>>>>>>> origin/master

        <?php if (!isset($_SESSION['username'])) 
        { ?>
        <div id="Buttons">
          <a href="registerPage.php">Register</a>
          <a href="logInPage.php">Log in</a>
        </div>
        <?php } 
        ?>
      </div>

    </header>