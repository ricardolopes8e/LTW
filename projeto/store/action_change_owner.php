<?php
  include_once('config/init.php');
  include_once('database/restaurant.php');

	//$idRestaurant = $_POST['idRestaurant'];

	if ($idRestaurant === "") {
		//$_SESSION['responseContent'] = 'No username specified.';
		$message = "No restaurant specified.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('Location: edit_restaurant.php');
		exit();
	}
	change_timetable($new_timetable, $idRestaurant);

	header('Location: index.php');  //tirar depois do index
	exit();
?>
