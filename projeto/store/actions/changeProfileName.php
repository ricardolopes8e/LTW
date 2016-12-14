<?php
	include_once('config/init.php');

	$currentUsername = $_SESSION['username'];
	$newUsername = $_POST['newUsername'];

	if ($newUsername === "") {
		$_SESSION['responseContent'] = 'No username specified.';
		header('Location: list_categories.php');
		exit();
	}

	$stmt = $conn->prepare(
		'SELECT * FROM user
		WHERE username = ?');
	$stmt->execute(array($newUsername));
	
	if ($stmt->fetch()) {
		$_SESSION['responseContent'] = 'That username is already taken.';
		header('Location: list_categories.php');
		exit();
	}

	$stmt = $conn->prepare(
		'UPDATE user
		SET username = ?
		WHERE username = ?');
	
	$stmt->execute(array(
		$newUsername,
		$currentUsername));
	
	$_SESSION['username'] = $newUsername;
	$_SESSION['responseContent'] = 'Edited username successfully. ';

	header('Location: list_categories.php');
	exit();
?>