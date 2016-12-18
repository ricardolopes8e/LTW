<?php
/* function addReview($restaurant_id){
	global $conn;
	$stmt = $conn->prepare('INSERT INTO review (username, comment, id_restaurant, id) VALUES (?,?,?,?)');
	$stmt->execute(array($_SESSION["username"], trim($_POST["comment"]), $_POST["id_restaurant"], $_POST["id"]));
	return $stmt->fetch();
  }
  */
  //obter as reviews associada a um restaurant
	function getRestaurant_reviews($id_restaurant){
		global $conn;
		$strcard = "SELECT * FROM review WHERE review.id_restaurant = $id_restaurant";
		$stmtcard = $conn->prepare($strcard);
		$stmtcard->execute();
		return $stmtcard->fetchAll();
	}
	
	//media rating 
	function getRestaurant_AverageRating_byId($id_restaurant) {
		$avg = 0;
		$ratingSum = 0;
		global $conn;
		$strcard = "SELECT rating FROM review WHERE review.id_restaurant = $id_restaurant";
		$stmtcard = $conn->prepare($strcard);
		$stmtcard->execute();
		$result = $stmtcard->fetchAll();
		if (count($result) === 0) {
			return 0;
		}
		foreach( $result as $reviews) {
			$rateSum += $reviews['rating'];
		}
		$avg = $ratingSum / count($result);
		$avg = round($avg, 1);
		return $avg;
	}
function insertReviewOnBd($id_restaurant, $username, $dateAval, $rating, $comment) {
	global $conn;
	$nextId;
    $stmtId = $conn->prepare('SELECT MAX(id) FROM review');
    $stmtId->execute();
    $lastId = $stmtId->fetch();
    foreach ($lastId as $row) {
    	$nextId = $row;
    }
   	$nextId++;
    $stmt = $db->prepare('INSERT INTO review VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($nextId, $id_restaurant, $username, $dateAval, $rating, $description));
}

?>