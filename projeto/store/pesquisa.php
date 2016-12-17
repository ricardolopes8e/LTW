<?php	
	include_once('config/init.php');

	include_once('templates/headerFinal.php');
	include_once('templates/footer.php');

	//$pesquisa = $_GET['pesquisa'];
	$Restaurant_search = $_GET['Restaurant_search'];

	//$resultRestaurante = pesquisaRestaurante($pesquisa);
	$stmt = $db->prepare("SELECT name, idRestaurant FROM Restaurant WHERE name LIKE '%$Restaurant_search%'");
	$stmt->execute();
	$Result_restaurants = $stmt->fetchAll();

	//$resultLocalizacao = pesquisaLocalizacao($pesquisa);
	$stmt = $db->prepare("SELECT City.city FROM City WHERE City.city LIKE '%$Restaurant_search%' GROUP BY City.city");
	$stmt->execute();
	$Restaurant_citys = $stmt->fetchAll();

	//$resultUsers = pesquisaUsers($pesquisa);
	$stmt = $db->prepare("SELECT User.username FROM User WHERE User.username LIKE '%$Restaurant_search%'");
	$stmt->execute();
	$Restaurant_users =  $stmt->fetchAll();


 
	include('templates/detalhesPesquisa.php');

?>