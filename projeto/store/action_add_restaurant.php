<?php
  include_once('config/init.php');
  include_once('database/restaurant.php');
  
  $name = trim(strip_tags($_POST['name']));

  createRestaurant($name);
  
  header('Location: list_restaurants.php');  
?>
