<?php

	include_once('config/init.php');

	$currentUsername = $_SESSION['username'];
	$newPassword = $_POST["newPassword"];
	$newPasswordConfirmation = $_POST["newPasswordConfirmation"];

	if ($newPassword !== $newPasswordConfirmation) 
	{
		$_SESSION['responseContent'] = 'Passwords not matching.';
		header('Location: list_categories.php');
		exit();
	}

	$stmt = $conn->prepare(
		'UPDATE user
		SET password = ?
		WHERE username = ?');
	
	$stmt->execute(array(
		hash('sha256', $newPassword),
		$currentUsername));
	
	$_SESSION['responseContent'] = 'Password successfully modified.';

	header('Location: list_categories.php');
	exit();
?>