<?php

function getProx_idFoto() {
	global $conn;
	
	$idF = $conn->prepare("SELECT MAX(idFoto) FROM Foto");
    $idF->execute();
	$idFt = $idF->fetch();
	$idFoto =  $idFt["MAX(idFoto)"];
	$idFoto++;
	return $idFoto;
}


function createphoto($id, $name) {
	global $conn;
	
	$stml = $conn->prepare('INSERT INTO Foto VALUES (?, ?)');
    $stml->execute(array($id, $name));
}

function putPhoto_to_user($user, $idFoto) {
	global $conn;
	
	$stml = $conn->prepare('INSERT INTO userFoto VALUES (?, ?)');
    $stml->execute(array($idFoto, $user));
}

function see_if_username_hasFoto($user){
		global $conn;
	
	$stmt = $conn->prepare('SELECT * FROM userFoto WHERE username =? ');
	$stmt->execute(array($user));
	return ($stmt->fetch()); 
}

function getInfoFoto($idFoto){
	
	global $conn;
	
	$stmt = $conn->prepare('SELECT * FROM Foto WHERE idFoto =? ');
	$stmt->execute(array($idFoto));
	return ($stmt->fetch()); 
	
}

function putPhoto_to_restaurant($id_restaurant, $idFoto) {
	global $conn;
	
	$stml = $conn->prepare('INSERT INTO restaurantFoto VALUES (?, ?)');
    $stml->execute(array($idFoto, $id_restaurant));
}
?>