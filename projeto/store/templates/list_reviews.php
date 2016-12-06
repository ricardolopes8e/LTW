<section id="content">
  <h2><?=$restaurant['name']?></h2>
  <ul class="review">
    <?php foreach ($reviews as $review) { ?>
      <li>
        <img src="images/<?=$review['id']?>.png">
        <a href="view_review.php?id_review=<?=$review['id']?>">
          <?=$review['name']?>
        </a>
      </li>
    <?php } ?>
  </ul>
</section>
