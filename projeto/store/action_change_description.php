<?php
  include_once('config/init.php');
  include_once('database/user.php');
  
	$current_username = $_SESSION['username'];
	$new_description = $_POST['new_description'];

	if ($new_description === "") {
		//$_SESSION['responseContent'] = 'No secondname specified.';
		$message = "No description specified.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('Location: edit_user.php');
		exit();
	}
	change_description($new_description, $current_username);
	
	//$_SESSION['responseContent'] = 'Edited second name successfully. ';
	$message = "Edited description successfully.";
	echo "<script type='text/javascript'>alert('$message');</script>";
	header('Location: mainpage.php');
  	exit();
?>