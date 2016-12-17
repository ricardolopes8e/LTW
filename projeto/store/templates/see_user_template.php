<?php
  include_once('config/init.php');
  
   global $conn;  
   
	$user = $_SESSION['username'];
  
	$stmt = $conn->prepare(
		'SELECT email FROM user
		WHERE username = ?');
	$email = $stmt->execute(array($user));
	
	$stmt = $conn->prepare(
		'SELECT  description FROM user
		WHERE username = ?');
	$description = $stmt->execute(array($user));
	
	$stmt = $conn->prepare(
		'SELECT photo_name FROM photo, user_photo
		WHERE user_photo.username = ? AND photo.id_photo= user_photo.id_photo');
	$id_photo = $stmt->execute(array($user));
  
?>
<section id="see_user">
	<h2>User</h2>
	<header>
		<img id="user_image" src="database/photos/<?=$id_photo?>" alt="userPic"/>
		<section>
			Username: <h3 id="username"><?=$user?></h3>
		</section>
		<section>
			Email: <h3 id="email"><?=$email?></h3>
		</section>
		<section>
			Description: <h3 id="description"><?=$description?></h3>
		</section>
	</header>
	
	 <li><a href="mainpage.php">Main Page</a></li>
</section>
