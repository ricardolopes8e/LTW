<?php
  
		include_once('config/init.php');
		include_once('database/restaurant.php');
		
		$idRestaurant = $_GET['idRestaurant'];
		
		$username = $_SESSION['username'];
		
		if(VerifyOwner($username, $idRestaurant)):?>
<section id="edit_restaurant">
  <h2>Edit Restaurant</h2>
  <form action="action_change_restaurant_name.php?idRestaurant=<?=$idRestaurant?>" method="post">
    <div class="form-input">New Name:
      <input type="text" name="new_name" id="new_name" placeholder="Enter new name">
    </divl>
	<input type="Submit" name="submit" value="Submit" class="submit-button">
  </form>


   <form action="action_change_timetable.php?idRestaurant=<?=$idRestaurant?>" method="post">
	<div class="form-input">New Timetable:
      <input type="datetime" name="new_timetable" id="new_timetable" placeholder="Enter new Timetable">
    </divl>
	<input type="Submit" name="submit" value="Submit" class="submit-button">
   </form>

    <form action="action_change_contact.php?idRestaurant=<?=$idRestaurant?>" method="post">
	<div class="form-input">New Contact:
      <input type="number" name="new_contact" id="new_contact" placeholder="Enter new Contact">
    </divl>
    <input type="Submit" name="submit" value="Submit" class="submit-button">
   </form>

   <form action="action_change_adress.php?idRestaurant=<?=$idRestaurant?>" method="post">
 <div class="form-input">New Adress:
     <input type="text" name="new_address" id="new_address" placeholder="Enter new Address">
   </divl>
   <input type="Submit" name="submit" value="Submit" class="submit-button">
  </form>

  <form action="action_change_city.php?idRestaurant=<?=$idRestaurant?>" method="post">
<div class="form-input">New City:
    <input type="text" name="new_city" id="new_city" placeholder="Enter new City">
  </divl>
  <input type="Submit" name="submit" value="Submit" class="submit-button">
 </form>

  <form action="action_change_restaurante_pic.php?idRestaurant=<?=$idRestaurant?>" method="post" enctype="multipart/form-data">
        <label>New Picture:
          <input type="file" name="FotoToUpload" id="fileToUpload">
        </label>
		<input type="Submit" name="submit" value="Submit" class="submit-button">
   </form>
   <div id="MainPage">
   <a href="index.php">Main Page</a>
   </divl>
</section>
		<?php else:?>
			<section id="edit_restaurant">
				<a href="index.php"> No permition</a>
			</section>
		<?php endif ?>