<?php
  include_once('config/init.php');
  include_once('database/restaurant.php');
  
  $name = trim(strip_tags($_POST['name']));
  $description = trim(strip_tags($_POST['description']));
  $local = trim(strip_tags($_POST['local']));
  $imagePath = trim(strip_tags($_POST['imagePath']));
  $username  = $_SESSION['username']; 
  
  global $conn;

      $stmt = $conn->prepare('SELECT id FROM user WHERE username = ?');
      $stmt->execute(array($username));
      $id_owner = $stmt->fetch();
	  
  createRestaurant($name, $description, $local, $imagePath, $id_owner);
  
  header('Location: list_restaurants.php');  
?>
