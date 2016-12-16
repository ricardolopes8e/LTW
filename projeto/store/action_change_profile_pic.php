<?php

include_once('config/init.php');
include_once('database/user.php');
  
	$currentProfilePic = $_SESSION['image'];
	$currentUsername = $_SESSION['username'];

	$picToUpload = $_POST["picToUpload"];
	$parsedPicToUpload = uniqid() . "-" . $picToUpload;
	
	rename(UPLOADS_PATH . "/$picToUpload", UPLOADS_PATH . "/$parsedPicToUpload");
	
	unlink(UPLOADS_PATH . "/$currentProfilePic");
	
	$stmt = $dbh->prepare(
		'UPDATE user
		SET image = ?
		WHERE username = ?');
	
	$stmt->execute(array($parsedPicToUpload, $currentUsername));
	
	$_SESSION['image'] = $parsedPicToUpload;
	session_write_close();
	
	echo json_encode(array('result' => 1));  
?>
