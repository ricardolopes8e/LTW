<?php
  function getAllRestaurants() {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM restaurant');
    $stmtRests = $conn->prepare($stmt);
	$stmtRests->execute();
	return $stmtRests->fetchAll();
  }
  
/*  Falta acrescentar na db e sql a tabela 
function getRestaurant_photo($id_restaurant){
	global $conn;
		$strft = "SELECT photo.descricao FROM photo, photo_restaurant WHERE photo_restaurant.id_restaurant = $id_restaurant AND photo_restaurant.id_photo = photo.id_photo";
	    $stmtfoto = $conn->prepare($strft);
		$stmtfoto->execute();
		return $stmtfoto->fetchAll();
}
*/

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
    function createRestaurant($name,$description,$local, $imagePath, $id_owner) {
      global $conn;

      $stmt = $conn->prepare('INSERT INTO restaurant( name, description, local, imagePath, id_owner) VALUES (?,?,?,?,?)');
      $stmt->execute(array($name,$description,$local, $imagePath, $id_owner));
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
