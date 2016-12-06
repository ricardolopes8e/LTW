<?php
  include_once('config/init.php');
  include_once('database/restaurant.php');
  include_once('database/review.php');

  $restaurant_id = $_GET['restaurant_id'];

  $category = getRestaurant($restaurant_id);
  $products = getReviewsFromRestaurant($restaurant_id);

  include ('templates/header.php');
  include ('templates/list_reviews.php');
  include ('templates/footer.php');
?>
