<?php
  function getReviewsFromRestaurant($restaurant_id) {
    global $conn;
    
    $stmt = $conn->prepare('SELECT * FROM review WHERE restaurant_id = ?');
    $stmt->execute(array($restaurant_id));
    return $stmt->fetchAll();
  }

  function addReview($restaurant_id){
	global $conn;
	$stmt = $conn->prepare('INSERT INTO review (idUser, comment, id_restaurant, id) VALUES (?,?,?,?)');
	$stmt->execute(array($_POST["idUser"], trim($_POST["comment"]), $_POST["id_restaurant"], $_POST["id"]));
	return $stmt->fetch();
  }
?>