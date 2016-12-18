<?php	
	include_once('config/init.php');

	include_once('templates/headerFinal.php');
	include_once('templates/footer.php');

	$Restaurant_search = $_GET['Restaurant_search'];


	$stmt = $conn->prepare("SELECT name, idRestaurant FROM Restaurant WHERE name LIKE '%$Restaurant_search%'");
	$stmt->execute();
	$Result_restaurants = $stmt->fetchAll();


	
 
	include('templates/Restaurant_search_result.php');

?>