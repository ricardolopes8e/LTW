<?php
include_once('config/init.php');
include_once('getRestaurantInfo.php');
include_once('database/photo.php'); 

include('templates/headerFinal.php');
include('templates/Corner_food.php');


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
<section id="Restaurant-Detailed-Info">
	<!-- <h2>Restaurant Detail</h2> -->
	<header>
		<section id="Restaurant-Info">
			<?php if($FotoName !== NULL)
			{?>
			<section id="Restaurant-Image">
				<img src="database/photos/<?=$FotoName?>" width="200" height="200">
			</section>
			<?php } ?>
			<section id="name">
				Name: <h3><?=$name?></h3>
			</section>
			<section id="owner">
				Owner: <h3><?=$owner?></h3>
			</section>	
			<section id="timetable">
				Timetable: <h3><?=$timetable?></h3>
			</section>
			<section id="contact">
				Contact: <h3><?=$contact?></h3>
			</section>
			<section id="address">
				Address: <h3><?=$address?></h3>
			</section>
			<section id="rating">
				Rating: <h3><?=$Rating?> stars</h3>
			</section>
		</section>
	</header>

	<li><a href="index.php">Main Page</a></li>
</section>

<?php

include('templates/footer.php');
?>