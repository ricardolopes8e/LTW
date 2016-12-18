<?php
  include_once('config/init.php');
  include_once('database/restaurant.php');
  include_once('database/photo.php'); 
  
  $name = trim(strip_tags($_POST['name']));
  $timetable = trim(strip_tags($_POST['timetable']));
  $contact = trim(strip_tags($_POST['contact']));
  $address = trim(strip_tags($_POST['address']));
  $city = $_POST['city'];
  $owner  = $_SESSION['username']; 
  
  global $conn;
  
 
  
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
		$idRestaurant = getProxIdRestaurant();
		
		move_uploaded_file($_FILES["FotoToUpload"]["tmp_name"], $FotoDest);
		

		$stml = $conn->prepare('INSERT INTO Foto (idFoto, fotoName) VALUES (?, ?)');
   		$stml->execute(array($idFoto, $fotoName));
		$stml->fetch(); 


		$stml = $conn->prepare('INSERT INTO RestaurantFoto ( idFoto, idRestaurant) VALUES (?, ?)');
    	$stml->execute(array($idFoto, $idRestaurant));
		$stml->fetch(); 
	}
	
	
	$idDeLocalizacaoArray = $conn->prepare("SELECT MAX(idCity) FROM City");
    $idDeLocalizacaoArray->execute();
	$idDeLocalizacaoResultado = $idDeLocalizacaoArray->fetch();
	$idDeLocalizacao =  $idDeLocalizacaoResultado["MAX(idCity)"];
	$idDeLocalizacao++;
	

	$stml = $conn->prepare('INSERT INTO City VALUES (?, ?)');
    $stml->execute(array($idDeLocalizacao, $city));
	
    
	  
  createRestaurant($name, $owner, $timetable, $contact, $address);
  
  header('Location: index.php');
	exit();  
?>
