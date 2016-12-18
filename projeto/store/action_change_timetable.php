<?php
  include_once('config/init.php');
  include_once('database/restaurant.php');

	$idRestaurant = $_GET['idRestaurant'];
	$new_timetable = $_POST['new_timetable']; 

	if ($new_timetable === "") {
		//$_SESSION['responseContent'] = 'No username specified.';
		$message = "No new timetable specified.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('Location: edit_restaurant.php');
		exit();
	}
	 updateRestaurant_timetable($idRestaurant, $new_timetable);
	
	$_SESSION['responseContent'] = 'Edited timetable successfully. ';

	header('Location: index.php');  //tirar depois do index
	exit();
?>
