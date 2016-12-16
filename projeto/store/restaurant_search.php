<?php
  include_once('config/init.php');
  include_once('database/restaurant.php');
  $name =$_GET['name'];

  $restaurants = getRestaurant_by_name($name);

  include ('templates/header.php');
  include ('templates/navigation.php');
  include ('templates/restaurant_header.php');
  include ('templates/result_search_restaurant.php');
  include ('templates/footer.php');
?>
