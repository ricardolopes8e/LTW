<?php

include_once('config/init.php');
include_once('database/user.php');
include_once('database/photo.php'); 
  
	$current_username = $_SESSION['username'];
	

	$extention = pathinfo($_FILES["FotoToUpload"]["name"], PATHINFO_EXTENSION);
		$size = getimagesize($_FILES["FotoToUpload"]["tmp_name"]);
		
		if($size == false) {
			exit("That file is not a image");
		}
		
		if ($_FILES["FotoToUpload"]["size"] > 5000000) {
			exit('File size is too big');
		}
		if (!see_if_username_hasFoto($current_username)){	
			$idFoto = getProx_IdFoto();
			$fotoName = $idFoto . '.' . $extention;
			$FotoDest = "database/photos/" . $fotoName;
		
			move_uploaded_file($_FILES["FotoToUpload"]["tmp_name"], $FotoDest);
		
			
			$stml = $conn->prepare('INSERT INTO Foto (idFoto, fotoName) VALUES (?, ?)');
			$stml->execute(array($idFoto, $fotoName));
			$stml->fetch(); 

		}
		else {
			$currentInfo=getInfo_user_photo($current_username); 
			$idFoto=$currentInfo['idFoto'];
			$currentInfoFoto=getInfoFoto($idFoto); 
			$OldName = $currentInfoFoto['fotoName']; 
			$fotoName = $idFoto. '.' . $extention;
			$FotoDest = "database/photos/" . $fotoName;
			
			unlink("database/photos/" . $OldName); 
			
			move_uploaded_file($_FILES["FotoToUpload"]["tmp_name"], $FotoDest);
			
			$stmt = $conn->prepare(
				'UPDATE Foto
				SET fotoName = ?
				WHERE idFoto=(SELECT idFoto FROM userFoto WHERE username = ?) ');
	
			$stmt->execute(array($fotoName, $current_username));
		}
	$stmt = $conn->prepare(
		'UPDATE userFoto
		SET idFoto = ?
		WHERE username = ?');
	
	$stmt->execute(array($idFoto, $current_username));
	
	//$_SESSION['image'] = $idFoto;
	session_write_close();
	
	header('Location: index.php');
?>
