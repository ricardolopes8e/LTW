<?php
  include_once('config/init.php');
  include_once('database/user.php');

	$current_username = $_SESSION['username'];
	$new_username = $_POST['new_username'];

	if ($new_username === "") {
		//$_SESSION['responseContent'] = 'No username specified.';
		$message = "No username specified.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('Location: edit_user.php');
		exit();
	}
	change_username($new_username, $current_username);
	
	$_SESSION['username'] = $new_username;
	$_SESSION['responseContent'] = 'Edited username successfully. ';
/*	$message = "Edited username successfully. ";
	echo "<script type='text/javascript'>alert('$message');</script>";*/

	header('Location: index.php');
	exit();
?>