<?php
  include_once('config/init.php');
  include_once('database/user.php'); 
  
   
	$user = $_SESSION['username'];

	$info = getInfo($user);
	$info_user_photo = GetInfo_user_photo($user);
	$email = $info['email']; 
//	$description = $info['description'];
	$id_photo = $info_user_photo['idFoto'];
 
 
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
	</header>
	
	 <li><a href="index.php">Main Page</a></li>
</section>
