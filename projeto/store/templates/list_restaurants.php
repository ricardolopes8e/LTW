<?php
  include_once('config/init.php');
  
   global $conn;  
   
	$stmt = $conn->prepare('SELECT * FROM restaurant');
    $stmt->execute();
    $restaurants = $stmt->fetchAll();
  ?>
<section id="content">
  <h2>Restaurants</h2>
  <ul class="restaurants">
    <?php foreach ($restaurants as $restaurant) { 
	
	$stmt = $conn->prepare(
		'SELECT id FROM restaurant
		WHERE id = ?');
	$restaurant_id = $stmt->execute(array($restaurant));
	
	$stmt = $conn->prepare(
		'SELECT name FROM restaurant
		WHERE id = ?');
	$restaurant_name = $stmt->execute(array($restaurant));
	
	$stmt = $conn->prepare(
		'SELECT imagePath FROM restaurant
		WHERE id = ?');
	$restaurant_image = $stmt->execute(array($restaurant));
	
	$stmt = $conn->prepare(
		'SELECT adress FROM restaurant
		WHERE id = ?');
	$restaurant_local= $stmt->execute(array($restaurant));
	
	$stmt = $conn->prepare(
		'SELECT description FROM restaurant
		WHERE id = ?');
	$restaurant_description = $stmt->execute(array($restaurant));
	
	?>
      <li>
		
		<?=$restaurant_name?>
		<?php echo "<br>";?>
		<img id="restaurant_image" src=<?=$restaurant_image?> alt="restaurant_pic"/>
		<?php
		echo "<br>"; 
		echo $restaurant_description;
		echo "<br>";
		echo $restaurant_adress; ?>
		
		<?php include('list_reviews.php?restaurant_id=$restaurant_id')?>
      </li>
    <?php } ?>
  </ul>
  <?php if (isset($_SESSION['username'])) {?>
    <a href="add_restaurant.php">Add</a>
  <?php } ?>
</section>
