<section id="content">
  <h2>Restaurants</h2>
  <ul class="restaurants">
    <?php foreach ($restaurants as $restaurant) { ?>
      <li>
        <a href="list_review.php?restaurant_id=<?=$restaurant['id']?>">
          <?=$restaurant['name']?>
        </a>
      </li>
    <?php } ?>
  </ul>
  <?php if (isset($_SESSION['username'])) {?>
    <a href="add_restaurant.php">Add</a>
  <?php } ?>
</section>
