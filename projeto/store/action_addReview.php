<?php
  include_once('config/init.php');
  
  $rating  = trim(strip_tags($_POST['rating']));
  $comment = trim(strip_tags($_POST['comment']));
  $idRestaurant = $_GET['idRestaurant'];
  $username  = $_SESSION['username']; 
  $dateAval = date(DATE_RFC2822); 
  
  global $conn;
	$stmt = $conn->prepare('INSERT INTO review (username, comment, idRestaurant, rating, dateAval) VALUES (?,?,?,?,?)');
	$stmt->execute(array($username, $comment, $idRestaurant, $rating, $dateAval));
	$stmt->fetch();
  
 
  header('Location: ' . 'RestaurantDetailPage.php?Restaurant_search=' . $idRestaurant); 
?>
