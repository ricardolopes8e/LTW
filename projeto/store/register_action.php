<?php
  include_once('config/init.php');
  include_once('database/photo.php'); 
  
  $username = trim(strip_tags($_POST['username']));
  
  $password = $_POST['password'];
  
  $email = $_POST['email'];
  
  $city = $_POST['city'];
  

  /*See if user aready exists*/
  $stmt = $conn->prepare('SELECT * FROM user WHERE username = ?');
  $stmt->execute(array($username));
  $userResult = $stmt->fetch();

  if (!$userResult) 
  {
  	/* See if file for user photo is empty or not*/
  	if(!empty($_FILES['FotoToUpload']['name']))
  	{
		$extention = pathinfo($_FILES["FotoToUpload"]["name"], PATHINFO_EXTENSION);
		$size = getimagesize($_FILES["FotoToUpload"]["tmp_name"]);
		
		if($size == false) {
			exit("That file is not a image");
		}
		
		if ($_FILES["FotoToUpload"]["size"] > 5000000) {
			exit('File size is too big');
		}
		
		$idFoto = getProxIdFoto();
		$fotoName = $idFoto . '.' . $extention;
		$FotoDest = "database/photos/" . $fotoName;
		
		move_uploaded_file($_FILES["FotoToUpload"]["tmp_name"], $FotoDest);
		

		$stml = $conn->prepare('INSERT INTO Foto (idFoto, fotoName) VALUES (?, ?)');
   		$stml->execute(array($idFoto, $fotoName));
		$stml->fetch(); 


		$stml = $conn->prepare('INSERT INTO userFoto ( idFoto, username) VALUES (?, ?)');
    	$stml->execute(array($idFoto, $user));
		$stml->fetch(); 
	}
	

	$idDeLocalizacaoArray = $conn->prepare("SELECT MAX(idCity) FROM City");
    $idDeLocalizacaoArray->execute();
	$idDeLocalizacaoResultado = $idDeLocalizacaoArray->fetch();
	$idDeLocalizacao =  $idDeLocalizacaoResultado["MAX(idCity)"];
	$idDeLocalizacao++;
	

	$stml = $conn->prepare('INSERT INTO City VALUES (?, ?)');
    $stml->execute(array($idDeLocalizacao, $city));
	
	/*Php library*/
    $options = ['cost' => 12];
    $hash_pass = password_hash($password, PASSWORD_DEFAULT, $options);
	
    $stmt = $conn->prepare('INSERT INTO user VALUES (?, ?, ?, ?)');
    $stmt->execute(array($username, $hash_pass, $email, $idDeLocalizacao));
	
	
    header('Location: index.php');
	}
	else {echo 'There is already a user with that name';}
  
?>
