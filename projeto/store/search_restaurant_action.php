<?php
	
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");
	
	$pesq = $_GET['pesquisa'];
	
	header('Location: ' . 'pesquisa.php?pesquisa=' . $pesq);  
?>
