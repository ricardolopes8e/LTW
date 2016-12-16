<?php
  include_once('config/init.php');
  
   global $conn;  
   
	$user = $_SESSION['username'];
  
	$stmt = $conn->prepare(
		'SELECT firstname FROM user
		WHERE username = ?');
	$firstname = $stmt->execute(array($user));
	
	$stmt = $conn->prepare(
		'SELECT  secondname FROM user
		WHERE username = ?');
	$secondname = $stmt->execute(array($user));
	
	$stmt = $conn->prepare(
		'SELECT  description FROM user
		WHERE username = ?');
	$description = $stmt->execute(array($user));
	
	$stmt = $conn->prepare(
		'SELECT imagePath FROM user
		WHERE username = ?');
	$imagePath = $stmt->execute(array($user));
  
?>
<section id="see_user">
	<h2>User</h2>
	<header>
		<img id="user_image" src=<?=$imagePath?> alt="userPiture"/>
		<section>
			Username: <h3 id="username"><?=$user?></h3>
		</section>
	</header>
	<article>
		<h3>Description: </h3>
		<p id="userDescription"><?=$description?></p>
	</article>
</section>
