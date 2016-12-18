<?php
  include_once('config/init.php');
  include_once('database/restaurant.php');
	$idRestaurant = $_GET['idRestaurant'];
	$new_name = $_POST['new_name']; 
	
	if ($new_name === "") {
		//$_SESSION['responseContent'] = 'No username specified.';
		$message = "No new name specified.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('Location: edit_restaurant.php');
		exit();
	}
	updateRestaurant_name($idRestaurant, $new_name);

	header('Location: index.php');  
	exit();
?>
