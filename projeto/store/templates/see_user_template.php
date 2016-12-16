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
		<img id="user_image" src=<?=$imagePath?> alt="userPic"/>
		<section>
			Username: <h3 id="username"><?=$user?></h3>
		</section>
		<section>
			First name: <h3 id="firstname"><?=$firstname?></h3>
		</section>
		<section>
			Last name: <h3 id="secondname"><?=$secondname?></h3>
		</section>
		<section>
			Description: <h3 id="description"><?=$description?></h3>
		</section>
	</header>
	
	 <li><a href="mainpage.php">Main Page</a></li>
</section>
