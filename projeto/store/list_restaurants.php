<?php
  include_once('config/init.php');
  include_once('database/restaurant.php');

  $categories = getAllCategories();
  
  include ('templates/header.php');
  include ('templates/navigation.php');
  include ('templates/video_header.php');
  include ('templates/search_restaurant.php');
  //include ('templates/list_categories.php');
  include ('templates/footer.php');
?>

