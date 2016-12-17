<?php

include_once('config/init.php');
include_once('database/user.php');
  
	$current_profilePic = $_SESSION['image'];
	$current_username = $_SESSION['username'];

	$picToUpload = $_POST["picToUpload"];
	$parsedPicToUpload = uniqid() . "-" . $picToUpload;
	
	rename(UPLOADS_PATH . "/$picToUpload", UPLOADS_PATH . "/$parsedPicToUpload");
	
	unlink(UPLOADS_PATH . "/$current_profilePic");
	
	$stmt = $conn->prepare(
		'UPDATE photo
		SET photo_name = ?
		WHERE id_photo=(SELECT id_photo FROM user_photo WHERE username = ?) ');
	
	$stmt->execute(array($parsedPicToUpload, $current_username));
	
	
	$stmt = $conn->prepare(
		'UPDATE user_photo
		SET id_photo = ?
		WHERE username = ?');
	
	$stmt->execute(array($id_photo, $current_username));
	
	
	
	$_SESSION['image'] = $parsedPicToUpload;
	session_write_close();
	
	echo json_encode(array('result' => 1));  
?>
