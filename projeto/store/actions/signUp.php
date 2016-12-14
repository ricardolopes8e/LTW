<?php
include_once("connection.php");

try {
	$username = $_POST["inputUsername"];
	$password = $_POST["inputPassword"];
	
	if (!isset($username)) die('No username');
	if (!isset($password)) die('No password');
	
	$stmt = $dbh->prepare(
		'SELECT * FROM user
		WHERE username = ?');
	$stmt->execute(array($username));
	
	if($stmt->fetch()) {
		$_SESSION['responseContent'] = 'That username is already taken.';
		header("Location: index.php?page=signUp");
		exit;
	}
	
	// inserting user into database
	$stmt = $dbh->prepare(
		'INSERT INTO user
		(username, password)
		VALUES (?, ?)');
	
	$stmt->execute(array(
		$username,
		hash('sha256', $password)));

	// getting user that has just sign up
	$stmt = $dbh->prepare(
		'SELECT * FROM user
		WHERE username = ?
		AND password = ?');
	$stmt->execute(array($username, hash('sha256', $password)));
	
	if (!($user = $stmt->fetch())) {
		$_SESSION['responseContent'] = 'Unexpected error after sign up: invalid username or password.';
		header("Location: index.php?page=signIn");
		exit;
	}
	// filling session with that user info to sign in directly after sign up submission
	$_SESSION['idUser'] = $user['idUser'];
	$_SESSION['username'] = $username;
	$_SESSION['image'] = $user['image'];
	$_SESSION['lastLoginDate'] = $user['lastLoginDate'];
	$_SESSION['registerDate'] = $user['registerDate'];
} catch(PDOException $e) {
	echo $e->getMessage();
	$_SESSION['responseContent'] = 'Could not update database, please try again later.';
	header("Location: index.php?page=signUp");
	exit;
}
header("Location: index.php?page=feed");
exit;
?>