<div class="detalhesRestauranteMainDiv">
		<div class="tabContentGroup">
			<div id="restaurantes" class="tabContent">

				<?php if(count($Result_restaurants)>0){
				 foreach($Result_restaurants as $row)
				 	{ ?>
						<div id="ForEveryRestaurant">
							<?php
								$Rest_Name = $row['name'];
				 				//$Rest_Name = $row;
								$stmt = $db->prepare("SELECT Restaurant.idRestaurant FROM Restaurant WHERE Restaurant.name = \"$Rest_Name\" ");
								$stmt->execute();
								$Review = $stmt->fetch(PDO::FETCH_ASSOC);
								$idRestaurant = $Review['idRestaurant'];

								/*For the average calculation*/
								$Media = 0;
								$SumRating = 0;
								$Rest_Ratings = "SELECT rating FROM Review WHERE Review.idRestaurant = $idRestaurant";
								$allRatings = $db->prepare($Rest_Ratings);
								$allRatings->execute();
								$Review = $allRatings->fetchAll();
								if (count($Review) === 0) 
								{
									return 0;
								}
								foreach( $Review as $review) 
								{
									$SumRating += $review['rating'];
								}
								$Media = $SumRating / count($Review);
								$Media = round($Media, 1);

								/*For out putting the city*/
						$stmt = $db->prepare("SELECT City.city FROM Restaurant, City WHERE City.idCity = Restaurant.idCity AND Restaurant.name = \"$Rest_Name\" ");
								$stmt->execute();
								$Rest_City = $stmt->fetch();
				 			?>
							<h1>Restaurant: <?=$Rest_Name ?></h1>
							<h3>City:<?=$Rest_City['city'] ?></h3>
							<h4>Average Review: <?=$Media?> stars</h4>
					
						</div>
				<?php } ?>
				<?php } ?>
			</div>	
		</div>
	</div>
