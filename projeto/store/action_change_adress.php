<?php
  include_once('config/init.php');
  include_once('database/restaurant.php');

	//$idRestaurant = $_POST['idRestaurant'];

	if ($idRestaurant === "") {
		//$_SESSION['responseContent'] = 'No username specified.';
		$message = "No restaurant specified.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('Location: edit_restaurant.php'); //id?
		exit();
	}
	change_adress($new_adress, $idRestaurant);

	header('Location: index.php');  //tirar depois do index
	exit();
?>
