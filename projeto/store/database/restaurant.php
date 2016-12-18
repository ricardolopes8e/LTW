<?php
  function getAllRestaurants() {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM restaurant');
    $stmtRests = $conn->prepare($stmt);
	$stmtRests->execute();
	return $stmtRests->fetchAll();
  }
  
  function VerifyOwner($username, $idRestaurant){
	  
	   global $conn;  
    
    $stmt = $conn->prepare('SELECT * FROM restaurant WHERE idRestaurant = ? AND owner = ?');
    $stmt->execute(array($idRestaurant, $username));
    return ($stmt->fetch() !== false);
  } 
  
function getProx_idRestaurant() {
	global $conn;
	
	$idR = $conn->prepare("SELECT MAX(idRestaurant) FROM Restaurant");
    $idR->execute();
	$idRes = $idR->fetch();
	$idRestaurant =  $idRes["MAX(idRestaurant)"];
	$idRestaurant++;
	return $idRestaurant;
}

//obter todas as info de um restaurant com base no id
  function getRestaurant($restaurant_id) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM restaurant WHERE id = ?');
    $stmt->execute(array($restaurant_id));
    return $stmt->fetchAll();
  }
//obter todas as info de um restaurant com base no name 
    function getRestaurant_by_name($name) {
      global $conn;

      $stmt = $conn->prepare('SELECT * FROM restaurant WHERE name = ?');
      $stmt->execute(array($name));
      return $stmt->fetchAll();
    }
//criar um restaurant
    function createRestaurant($name,$owner,$timetable, $contact, $address) {
      global $conn;

      $stmt = $conn->prepare('INSERT INTO restaurant( name, owner, timetable, contact, address) VALUES (?,?,?,?,?)');
      $stmt->execute(array($name,$owner,$timetable, $contact, $address));
      return $stmt->fetch();
    }
//obter o id de um restaurant com base no nome 
    function getRestaurant_ID($name) {
      global $conn;

      $stmt = $conn->prepare('SELECT id FROM restaurant WHERE name = ?');
      $stmt->execute(array($name));
      return $stmt->fetch();
    }
	

//obter o contacto, horario e username by id
	function getTimetable_Contact_Owner_FromRestaurant($id_restaurant) {
		global $conn;
		$stmt = $conn->prepare('SELECT timetable, contact, username FROM restaurant WHERE
				id_restaurant = ? ');
		$stmt->execute(array($id_restaurant));
		$result = $stmt->fetch();
		return $result;
}

function searchRestaurant($search){
	global $conn;
	$stmt = $conn->prepare("SELECT name, id_restaurant FROM restaurant WHERE name LIKE '%$search%'");
	$stmt->execute();
	$result = $stmt->fetchAll();
	return $result;
}

function search_Sugestion_Restaurant($search){
	global $conn;
	$stmt = $conn->prepare("SELECT name FROM restaurant WHERE name LIKE '%$search%' LIMIT 10");
	$stmt->execute();
	$result = $stmt->fetchAll();
	return $result;
}

function updateRestaurant_timetable($id_restaurant, $timetable){
		global $conn;
		$stmt = $conn->prepare("UPDATE restaurant SET timetable = ? WHERE idRestaurant = ?");
		$stmt->execute(array($timetable,$id_restaurant));
	}
	function updateRestaurant_name($id_restaurant, $name){
		global $conn;
		$stmt = $conn->prepare("UPDATE restaurant SET name = ? WHERE idRestaurant = ?");
		$stmt->execute(array($name, $id_restaurant));
	}
		function updateRestaurant_address($id_restaurant, $address){
		global $conn;
		$stmt = $conn->prepare("UPDATE restaurant SET address = ? WHERE idRestaurant = ?");
		$stmt->execute(array($address, $id_restaurant));
	}

    	function updateRestaurant_contact($id_restaurant, $contact){
		global $conn;
		$stmt = $conn->prepare("UPDATE restaurant SET contact = ? WHERE idRestaurant = ?");
		$stmt->execute(array($contact, $id_restaurant));
	}
	
		function existCity($city){
			    global $conn;

			$stmt = $conn->prepare('SELECT * FROM City WHERE city = ?');
			$stmt->execute(array($city));
			return $stmt->fetch();		
		}
	
	function updateRestaurant_city($new_city, $idRestaurant){
		global $conn;
		
		if($infocity=existCity($new_city)){
			$idCity=$infocity['idCity']; 
				$stmt = $conn->prepare("UPDATE restaurant SET idCity = ? WHERE idRestaurant = ?");
				$stmt->execute(array($idCity, $idRestaurant));
		}
		else{	
		$idDeLocalizacaoArray = $conn->prepare("SELECT MAX(idCity) FROM City");
		$idDeLocalizacaoArray->execute();
		$idDeLocalizacaoResultado = $idDeLocalizacaoArray->fetch();
		$idDeLocalizacao =  $idDeLocalizacaoResultado["MAX(idCity)"];
		$idDeLocalizacao++;
	

		$stml = $conn->prepare('INSERT INTO City VALUES (?, ?)');
		$stml->execute(array($idDeLocalizacao, $new_city));
		
		$stmt = $conn->prepare("UPDATE restaurant SET idCity = ? WHERE idRestaurant = ?");
		$stmt->execute(array($idDeLocalizacao, $idRestaurant));
		}
		
	}

   function getInfo_restaurant_photo($idRestaurant) {
    global $conn;  
    
    $stmt = $conn->prepare('SELECT * FROM RestaurantFoto WHERE idRestaurant = ?');
	$stmt->execute(array($idRestaurant));
	return ($stmt-> fetch()); 
  }
  ?>
  