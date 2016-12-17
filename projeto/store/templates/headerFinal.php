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
      <div class="vid-content">
        <h1> <a href="index.php">Corner's Food</a> </h1>
        <p>Find your favourite restaurant</p>
      </div>

      <?php include('templates/search_restaurant_form.php') ?>

      <div id="logreg">
          <?php if (isset($_SESSION['username'])) 
              { ?>
              <div id="LogOut-Button">
                <a href="action_logout.php">Log Out</a>
              </div>
            <?php } 
          ?>

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