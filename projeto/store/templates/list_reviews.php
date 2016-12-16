<?php
  include_once('config/init.php');
  
   global $conn;  

  ?>

<section id="content">
  <h2><?=$restaurant['name']?></h2>
  <ul class="review">
    <?php foreach ($reviews as $review) { 
	
	
	$stmt = $conn->prepare('SELECT * FROM review');
    $stmt->execute();
    $review = $stmt->fetch();
	
	?>
      <li>
        <a href="view_review.php?id_review=<?=$review['id']?>">
          <?=$review['name']?>
        </a>
      </li>
    <?php } ?>
  </ul>
</section>
