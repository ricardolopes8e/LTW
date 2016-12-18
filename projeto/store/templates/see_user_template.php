<?php
  include_once('config/init.php');
  include_once('database/user.php'); 
  include_once('database/photo.php'); 

   
	$user = $_SESSION['username'];

	$info = getInfo($user);
	$info_user_photo = GetInfo_user_photo($user);
	$email = $info['email']; 
//	$description = $info['description'];
	$idFoto = $info_user_photo['idFoto'];
	$infoFoto = getInfoFoto($idFoto);
	$FotoName = $infoFoto['fotoName']
 
 
?>
<section id="see_user">
	<h2>User</h2>
	<header>
	
    </section>
		<?php if($FotoName !== NULL)
			{?>
			<section id="user_image">
				<img src="database/photos/<?=$FotoName?>" width="200" height="200">
			</section>
			<?php } ?>
		<section>
			Username: <h3 id="username"><?=$user?></h3>
		</section>
		<section>
			Email: <h3 id="email"><?=$email?></h3>
		</section>
	</header>
	
	 <li><a href="index.php">Main Page</a></li>
</section>
