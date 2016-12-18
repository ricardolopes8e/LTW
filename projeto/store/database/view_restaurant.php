<?php

function getRestauranteById($idRestaurant) {
	global $conn;
	$stmt = $conn->prepare('SELECT idRestaurant, name, city,timetable,contact,owner FROM Restaurant, City WHERE
			idRestaurant = ? AND Restaurant.idCity = City.idCity');
	$stmt->execute(array($idRestaurant));
	$result = $stmt->fetch();
	return $result;
}

function getCoentarioFromRestaurante($idRestaurant){
	global $conn;
	$Review = "SELECT * FROM Review WHERE Review.idRestaurant = $idRestaurant";
	$ReviewString = $conn->prepare($Review);
	$ReviewString->execute();
	return $ReviewString->fetchAll();
}

function getAverageRateFromRestauranteById($idRestaurante) {
	$avg = 0;
	$rateSum = 0;
	global $conn;
	$strcard = "SELECT rate FROM Comentario WHERE Comentario.idRestaurante = $idRestaurante";
	$stmtcard = $conn->prepare($strcard);
	$stmtcard->execute();
	$result = $stmtcard->fetchAll();
	if (count($result) === 0) {
		return 0;
	}
	foreach( $result as $coments) {
		$rateSum += $coments['rate'];
	}
	$avg = $rateSum / count($result);
	$avg = round($avg, 1);
	return $avg;
}

?>