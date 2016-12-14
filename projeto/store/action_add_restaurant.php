<?php
  include_once('config/init.php');
  include_once('database/restaurant.php');
  
  $name = trim(strip_tags($_POST['name']));
  $description = trim(strip_tags($_POST['description']));
  $localization = trim(strip_tags($_POST['localization']));
  createRestaurant($name, $description, $localization);
  
  header('Location: list_restaurants.php');  
?>
