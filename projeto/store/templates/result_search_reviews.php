<?php
  include_once('config/init.php');

   global $conn;

   $stmt = $conn->prepare('SELECT * FROM Review WHERE idRestaurant = ?');
     $stmt->execute(array($_GET["idRestaurant"]));
     $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>
<section id="review_container">
  <ul class="reviews">

    <?php

    $i=0;
    foreach ($reviews as $review) {
      foreach ($review as $review_element){
      $i=$i+1;

	?>
  <?php
  switch ($i){
    case "1":break;
    case "2":break;
    case "3"://echo "username:";
    $username=$review_element;
    //echo "<br>";
      break;
    case "4"://echo "rating:";
    $rating=$review_element;
    //echo "<br>";
    break;
    case "5"://echo "date:";
     $date=$review_element;
    //echo "<br>";
    break;
    case "6"://echo "comment:";
     $comment=$review_element;
    //echo "<br>";
    $i=0;
    break;
  }
  //echo "<br>";
}
?>
  <div class="news-item">
    <div><p class="introduction"><?=$comment?></p></div>
    <div class="clear"> </div>
  </div>
  <div id="info">
  <ul>
  <li>name:<?=$username?></li>
  <li>Date:<?=$date?></li>
  <li>Rating:<?=$rating?></li>
  </ul>
  
  <li><a href="addReview.php?idRestaurant=<?=$_GET["idRestaurant"]?>">Add Review</a></li>
  </div>


    <?php } ?>
  </ul>
</section>
