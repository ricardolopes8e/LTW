<?php
	
	header("Cache-Control: no-cache, must-revalidate");
	//header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");

	include_once('config/init.php');
	//include_once('baseDados/restaurante.php');

	//include_once('baseDados/cardapio.php');
	include_once('templates/headerFinal.php');
	include_once('templates/footer.php');

	//$pesquisa = urldecode($_POST['pesquisa']);
	$Restaurant_search = urldecode($_POST['Restaurant_search']);

	//$resultRestaurante = pesquisaRestaurante($pesquisa);
	$stmt = $db->prepare("SELECT name, idRestaurant FROM Restaurant WHERE name LIKE '%$Restaurant_search%'");
	$stmt->execute();
	$Result_restaurant = $stmt->fetchAll();

	//$resultLocalizacao = pesquisaLocalizacao($pesquisa);
	$stmt = $db->prepare("SELECT City.city FROM City WHERE City.city LIKE '%$Restaurant_search%' GROUP BY City.city");
	$stmt->execute();
	$Restaurant_city = $stmt->fetchAll();
 
	include('templates/detalhesPesquisa.php');
  
  //header('Location: ' . '.php');  
?>