<?php

  include_once('config/init.php');
  include_once('database/user.php');
  
	$current_firstname = $_SESSION['firstname'];
	$new_firstname = $_POST['new_firstname'];

	if ($new_firstname === "") {
		//$_SESSION['responseContent'] = 'No firstname specified.';
		$message = "No firstname specified.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('Location: list_restaurants.php');
		exit();
	}
	change_firstname($new_firstname, $current_firstname);
	
	
	//$_SESSION['responseContent'] = 'Edited first name successfully. ';
	$message = "Edited first name successfully.";
	echo "<script type='text/javascript'>alert('$message');</script>";
	header('Location: list_restaurants.php');
	exit();
?>