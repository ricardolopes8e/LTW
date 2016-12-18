<?php
	
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");
	
	$search = $_GET['Restaurant_search'];
	
	header('Location: ' . 'search_restaurant.php?Restaurant_search=' . $search);  
?>
