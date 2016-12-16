<?php

include_once('config/init.php');
  

	$current_username = $_SESSION['username'];
	$new_password = $_POST["new_password"];
	$new_password_confirmation = $_POST["new_password_confirmation"];

	if ($newPassword !== $new_password_confirmation) 
	{
		//$_SESSION['responseContent'] = 'Passwords not matching.';
		$message = "Passwords not matching.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('Location: edit_user.php');
		exit();
	}

	$stmt = $conn->prepare(
		'UPDATE user
		SET password = ?
		WHERE username = ?');
	
	$stmt->execute(array($new_password,$current_username));
	
	//$_SESSION['responseContent'] = 'Password successfully modified.';
	$message = "Password successfully modified.";
	echo "<script type='text/javascript'>alert('$message');</script>";

	header('Location: mainpage.php');
	exit();
?>