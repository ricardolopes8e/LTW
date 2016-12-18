<?php
	include_once('config/init.php');
	include_once("getRestaurantInfo.php");
	include_once('database/photo.php'); 

//	include('templates/headerFinal.php');
	
	$Restaurant_search = $_GET['Restaurant_search'];

	$restaurante = getRestaurant_name($Restaurant_search);
	$res = getInfo_restaurant($Restaurant_search); 

	$info_restaurant_photo = getInfo_restaurant_photo($Restaurant_search);
	$name = $res['name']; 
	$owner = $res['owner']; 
	$timetable = $res['timetable']; 
	$contact = $res['contact']; 
	$address = $res['address'];
	
	$idFoto = $info_restaurant_photo['idFoto'];
	$infoFoto = getInfoFoto($idFoto);
	$FotoName = $infoFoto['fotoName'];

    $Rating = getAverage($Restaurant_search);
   
	$stmt = $conn->prepare('SELECT * FROM Review WHERE Review.idRestaurant = ?');
    $stmt->execute(array($Restaurant_search));
    $resultreview = $stmt->fetchAll();
	  
	?>
	<section id="details restaurant">
	<h2>Restaurant Detail</h2>
	<header>
	
    </section>
		<?php if($FotoName !== NULL){?>
		<section>
		<img src="database/photos/<?=$FotoName?>" width="200" height="200">
		</section>
		<?php } ?>
		<section>
			Name: <h3 id="name"><?=$name?></h3>
		</section>
		<section>
			Owner: <h3 id="owner"><?=$owner?></h3>
		</section>	
		<section>
			Timetable: <h3 id="timetable"><?=$timetable?></h3>
		</section>
		<section>
			Contact: <h3 id="contact"><?=$contact?></h3>
		</section>
		<section>
			Address: <h3 id="address"><?=$address?></h3>
		</section>
		<section>
			Rating: <h3 id="rating"><?=$Rating?></h3>
		</section>
		<a href="RestaurantDetailPage.php?Restaurant_search=<?=$resultreview?>#info"> Ver detalhes do restaurante </a>
		
	</header>
	
	 <li><a href="index.php">Main Page</a></li>
</section>

<?php

//include('templates/detalhesRestaurante.php');
	include('templates/footer.php');
?>