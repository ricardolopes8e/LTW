<?php

include_once('config/init.php');
include_once('database/restaurant.php');
include_once('database/photo.php'); 
  
	$current_restaurant = $_GET['idRestaurant'];
	

	$extention = pathinfo($_FILES["FotoToUpload"]["name"], PATHINFO_EXTENSION);
		$size = getimagesize($_FILES["FotoToUpload"]["tmp_name"]);
		
		if($size == false) {
			exit("That file is not a image");
		}
		
		if ($_FILES["FotoToUpload"]["size"] > 5000000) {
			exit('File size is too big');
		}
		if (!see_if_restaurant_hasFoto($current_restaurant)){	
			$idFoto = getProx_IdFoto();
			$fotoName = $idFoto . '.' . $extention;
			$FotoDest = "database/photos/" . $fotoName;
		
			move_uploaded_file($_FILES["FotoToUpload"]["tmp_name"], $FotoDest);
		
			
			$stml = $conn->prepare('INSERT INTO Foto (idFoto, fotoName) VALUES (?, ?)');
			$stml->execute(array($idFoto, $fotoName));
			$stml->fetch(); 

		}
		else {
			$currentInfo=getInfo_restaurant_photo($current_restaurant); 
			$idFoto=$currentInfo['idFoto'];
			$currentInfoFoto=getInfoFoto($idFoto); 
			$OldName = $currentInfoFoto['fotoName']; 
			$fotoName = $idFoto. '.' . $extention;
			$FotoDest = "database/photos/" . $fotoName;
			
			var_dump($idFoto); 
			var_dump($currentInfo); 
			var_dump($current_restaurant); 
			
			unlink("database/photos/" . $OldName); 
			
			move_uploaded_file($_FILES["FotoToUpload"]["tmp_name"], $FotoDest);
			
			$stmt = $conn->prepare(
				'UPDATE Foto
				SET fotoName = ?
				WHERE idFoto=(SELECT idFoto FROM RestaurantFoto WHERE idRestaurant = ?) ');
	
			$stmt->execute(array($fotoName, $current_restaurant));
		}
	$stmt = $conn->prepare(
		'UPDATE RestaurantFoto
		SET idFoto = ?
		WHERE idRestaurant = ?');
		
	$stmt->execute(array($idFoto, $current_restaurant));
	
	//$_SESSION['image'] = $idFoto;
	session_write_close();
	
	header('Location: index.php');
?>
