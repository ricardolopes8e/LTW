<?php
	include_once('config/init.php');
	include_once('database/view_restaurant.php');

	include('templates/headerFinal.php');
	
	$Restaurant_search = $_GET['Restaurant_search'];

	$restaurante = getRestauranteById($Restaurant_search);

	//$resultfoto = getFotoFromRestaurante($Restaurant_search);

	//$resultcomentario = getCoentarioFromRestaurante($Restaurant_search);
	$Review = "SELECT * FROM Review WHERE Review.idRestaurant = $Restaurant_search";
	$ReviewString = $conn->prepare($Review);
	$ReviewString->execute();
	$resultcomentario->fetchAll();

	$notaMediaRestaurante = getAverageRateFromRestauranteById($Restaurant_search);

	include('templates/detalhesRestaurante.php');
	include('templates/footer.php');
?>