<?php
  include_once('config/init.php');
  include_once('database/restaurant.php');

	$idRestaurant = $_GET['idRestaurant'];
	$new_city = $_POST['new_city'];

	if ($idRestaurant === "") {
		//$_SESSION['responseContent'] = 'No username specified.';
		$message = "No restaurant specified.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('Location: edit_restaurant.php');
		exit();
	}
	updateRestaurant_city($new_city, $idRestaurant);

	header('Location: index.php');  //tirar depois do index
	exit();
?>
