<?php 
function getRestaurant($Rest_Name){
	global $conn;
	$stmt = $conn->prepare("SELECT idRestaurant FROM Restaurant WHERE name = \"$Rest_Name\"");
	$stmt->execute();
	$RestArray= $stmt->fetch(PDO::FETCH_ASSOC);
	$Rest = $RestArray['idRestaurant'];
	return $Rest;
}

function getAverage($Rest) {
	global $conn;
	
	$Average = 0;
	$Sum_Average = 0;

	$Rating = "SELECT rating FROM Review WHERE Review.idRestaurant = $Rest";
	$All_rating = $conn->prepare($Rating);
	$All_rating->execute();
	$result = $All_rating->fetchAll();

	if (count($result) === 0) 
	{
		return 0;
	}
	foreach( $result as $coments) {
		$Sum_Average += $coments['rating'];
	}
	$Average = $Sum_Average / count($result);
	$Average = round($Average, 1);
	return $Average;
}

function getCity($Rest_Name){
	global $conn;
	$stmt = $conn->prepare("SELECT City.city FROM Restaurant, City WHERE City.idCity = Restaurant.idCity AND Restaurant.name = \"$Rest_Name\"");
	$stmt->execute();
	return $stmt->fetch();
}

?>