<?php

  include_once('config/init.php');
  include_once('database/user.php');
  
	$current_username = $_SESSION['username'];
	$new_email = $_POST['new_email'];

	if ($new_email === "") {
		//$_SESSION['responseContent'] = 'No email specified.';
		$message = "No email specified.";
		//echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<script type='text/javascript'>alert('$message')</script>";
		header('Location: edit_user.php');
		exit();
	}
	change_email($new_email, $current_username);
	
	
	$_SESSION['responseContent'] = 'Edited first name successfully. ';
	/*$message = "Edited email successfully.";
	echo "<script type='text/javascript'>alert('$message');</script>";*/
	header('Location: index.php');
	exit();
?>