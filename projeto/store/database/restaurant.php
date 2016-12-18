<?php
  function getAllRestaurants() {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM restaurant');
    $stmtRests = $conn->prepare($stmt);
	$stmtRests->execute();
	return $stmtRests->fetchAll();
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
		$stmt = $conn->prepare("UPDATE restaurant SET timetable = \"$timetable\" WHERE id_restaurant = \"$id_restaurant\"");
		$stmt->execute();
		return $stmt->fetch();
	}
	
function updateRestaurant_contact($id_restaurant, $contact){
		global $conn;
		$stmt = $conn->prepare("UPDATE restaurant SET contact = \"$contact\" WHERE id_restaurant = \"$id_restaurant\"");
		$stmt->execute();
		return $stmt->fetch();
	}
  ?>
