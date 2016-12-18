
<section id="edit_user">
  <h2>Edit Restaurant</h2>
  <form action="action_change_restaurant_name.php?idRestaurant=" . $_GET['idRestaurant'] method="post">
    <div class="form-input">New Name:
      <input type="text" name="new_name" id="new_name" placeholder="Enter new name">
    </divl>
	<input type="Submit" name="submit" value="Submit" class="submit-button">
  </form>

  <form action="action_change_owner.php" method="post">
    <div class="form-input">New owner name:
      <input type="text" name="new_owner" id="new_owner" placeholder="Enter new owner name">
	</divl>
    <input type="Submit" name="submit" value="Submit" class="submit-button">

	</form>

   <form action="action_change_timetable.php" method="post">
	<div class="form-input">New Timetable:
      <input type="text" name="new_timetable" id="new_timetable" placeholder="Enter new Timetable">
    </divl>
	<input type="Submit" name="submit" value="Submit" class="submit-button">
   </form>

    <form action="action_change_contact.php" method="post">
	<div class="form-input">New Contact:
      <input type="text" name="new_contact" id="new_contact" placeholder="Enter new Contact">
    </divl>
    <input type="Submit" name="submit" value="Submit" class="submit-button">
   </form>

   <form action="action_change_adress.php" method="post">
 <div class="form-input">New Adress:
     <input type="text" name="new_adress" id="new_adress" placeholder="Enter new Adress">
   </divl>
   <input type="Submit" name="submit" value="Submit" class="submit-button">
  </form>

  <form action="action_change_city.php" method="post">
<div class="form-input">New City ID:
    <input type="text" name="new_city" id="new_city" placeholder="Enter new City ID">
  </divl>
  <input type="Submit" name="submit" value="Submit" class="submit-button">
 </form>

  <form action="action_change_restaurant_pic.php" method="post" enctype="multipart/form-data">
        <label>New Picture:
          <input type="file" name="FotoToUpload" id="fileToUpload">
        </label>
		<input type="Submit" name="submit" value="Submit" class="submit-button">
   </form>
   <div id="MainPage">
   <a href="index.php">Main Page</a>
   </divl>
</section>
