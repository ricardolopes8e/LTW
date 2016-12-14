<?php
  include_once('config/init.php');

//adicionar uma imagem ao restaurant

<!DOCTYPE HTML>
<html>
  <head>
    <title>Add Restaurant</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css"> 
  </head>
  <body>
    <header>
      <h1><a href="upload_image_restaurant.php">Images</a></h1>
    </header>
    <nav>
      <form action="image_restaurant.php" method="post" enctype="multipart/form-data">
        <label>Title:
          <input type="text" name="title">
        </label>
        <input type="file" name="image">
        <input type="submit" value="Upload">
      </form>
    </nav>
    <section id="images">
      <?php foreach ($images as $image) { ?>
      <article class="image">
        <header><h2><?=$image['title']?></h2></header>
  //      <a href="view_image.php?id=<?=$image['id']?>">
   //       <img src="images/thumbs_small/<?=$image['id']?>.jpg" width="200" height="200">
     //   </a>
      </article>
      <?php } ?>
    </section>
  </body>
</html>

  
  include ('templates/header.php');
  include ('templates/add_restaurant.php');
  include ('templates/footer.php');
?>
