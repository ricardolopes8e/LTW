<?php
  $dbh = new PDO('sqlite:food.db');
  $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $dbh->prepare("SELECT * FROM image_restaurant WHERE id = ?");
  $stmt->execute(array($_GET['id']));
  
  $image = $stmt->fetch();
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>View Image</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css"> 
  </head>
  <body>
    <header>
      <h1><a href="add_restaurant.php">Images</a></h1>
    </header>
    <article class="image single">
      <header><h2><?=$image['title']?></h2></header>
      <a href="images/originals/<?=$image['id']?>.jpg">
        <img src="images/thumbs_medium/<?=$image['id']?>.jpg">
      </a>
    </article>
  </body>
</html>
