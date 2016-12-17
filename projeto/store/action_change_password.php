<?php

include_once('config/init.php');
  

	$current_username = $_SESSION['username'];
	$new_password = $_POST["new_password"];
	$new_password_confirmation = $_POST["new_password_confirmation"];
	$options = ['cost' => 12];

	if ($new_password !== $new_password_confirmation) 
	{
		//$_SESSION['responseContent'] = 'Passwords not matching.';
		$message = "Passwords not matching.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('Location: edit_user.php');
		exit();
	}
	else{
	$hash_pass = password_hash($new_password, PASSWORD_DEFAULT, $options);
	
	$stmt = $conn->prepare(
		'UPDATE user
		SET password = ?
		WHERE username = ?');
	
	$stmt->execute(array($hash_pass,$current_username));
	$stmt->execute();
	}
	//$_SESSION['responseContent'] = 'Password successfully modified.';
	$message = "Password successfully modified.";
	echo "<script type='text/javascript'>alert('$message');</script>";

	header('Location: index.php');
	exit();
?>