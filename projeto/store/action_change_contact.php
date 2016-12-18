<?php
  include_once('config/init.php');
  include_once('database/restaurant.php');
	$idRestaurant = $_GET['idRestaurant'];
	$new_contact = $_POST['new_contact']; 
	
	if ($new_contact === "") {
		//$_SESSION['responseContent'] = 'No usercontact specified.';
		$message = "No contact specified.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('Location: edit_restaurant.php');
		exit();
	}
	updateRestaurant_contact($idRestaurant, $new_contact);

	header('Location: index.php');  
	exit();
?>
