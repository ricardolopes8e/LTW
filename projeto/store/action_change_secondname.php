<?php
  include_once('config/init.php');
  include_once('database/user.php');
  
	$current_username = $_SESSION['username'];
	$new_secondname = $_POST['new_secondname'];

	if ($new_secondname === "") {
		//$_SESSION['responseContent'] = 'No secondname specified.';
		$message = "No secondname specified.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('Location: edit_user.php');
		exit();
	}
	change_secondname($new_secondname, $current_username);
	
	//$_SESSION['responseContent'] = 'Edited second name successfully. ';
	$message = "Edited second name successfully.";
	echo "<script type='text/javascript'>alert('$message');</script>";
	header('Location: mainpage.php');
  	exit();
?>