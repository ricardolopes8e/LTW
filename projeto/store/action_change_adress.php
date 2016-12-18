<?php
  include_once('config/init.php');
  include_once('database/restaurant.php');

	$idRestaurant = $_GET['idRestaurant'];
	$new_address = $_POST['new_address']; 

	if ($new_address === "") {
		//$_SESSION['responseContent'] = 'No username specified.';
		$message = "No restaurant specified.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('Location: edit_restaurant.php'); //id?
		exit();
	}
	updateRestaurant_address($idRestaurant, $new_address);

	header('Location: index.php');  //tirar depois do index
	exit();
?>
