<div class="List-Restaurants">
		<div class="List-Restaurants-contents">
			<div id="restaurantes">

				<?php if(count($Result_restaurants)>0)
				{
					include("getRestaurantInfo.php");
					foreach($Result_restaurants as $ThisRestaurant)
						{ ?>
					
					<div id="Restaurant">

						<?php 
						
						$This_Rest_Name = $ThisRestaurant['name'];

						$Rest = getRestaurant($This_Rest_Name);
						
						$Rating = getAverage($Rest);
						
						$Rest_City = getCity($This_Rest_Name);
						
						?>

						<h1>Restaurant: <?=$This_Rest_Name ?></h1>
						<h1>City: <?=$Rest_City['city'] ?></h1>
						<h1>Rating: <?=$Rating ?> stars</h1>


						<a href="RestaurantDetailPage.php?Restaurant_search=<?=$This_Rest_Name['idRestaurant'] ?>#info"> See Restaurant </a>

					</div>
					<?php } ?>
					<?php } ?>

			</div>	
		</div>
	</div>
