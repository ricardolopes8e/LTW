<?php

function getProx_id_photo() {
	global $conn;
	
	$idF = $conn->prepare("SELECT MAX(id_photo) FROM photo");
    $idF->execute();
	$idFt = $idF->fetch();
	$id_photo =  $idFt["MAX(id_photo)"];
	$id_photo++;
	return $id_photo;
}


function createphoto($id, $name) {
	global $conn;
	
	$stml = $conn->prepare('INSERT INTO photo VALUES (?, ?)');
    $stml->execute(array($id, $name));
}

function putPhoto_to_user($user, $id_photo) {
	global $conn;
	
	$stml = $conn->prepare('INSERT INTO user_photo VALUES (?, ?)');
    $stml->execute(array($id_photo, $user));
}

function putPhoto_to_restaurant($id_restaurant, $id_photo) {
	global $conn;
	
	$stml = $conn->prepare('INSERT INTO restaurant_photo VALUES (?, ?)');
    $stml->execute(array($id_photo, $id_restaurant));
}
?>