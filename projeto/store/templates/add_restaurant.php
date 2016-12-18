<section id="content">
  <h2>Add Restaurant</h2>
  <form action="action_add_restaurant.php" method="post">
    <div class="form-input">Name:
        <input type="text" name="name" placeholder="Enter name">
    </div>
    <div class="form-input">Timetable:
        <input type="text" name="timetable" placeholder="Enter timetable">
    </div>
    <div class="form-input">Contact:
        <input type="text" name="contact" placeholder="Enter contact">
    </div>
	<div class="form-input">Address:
        <input type="address" name="address" placeholder="Enter address">
    </div>
	  <div class="form-input">City:
        <input type="city" name="city" placeholder="City">
    </div>
	  <div class="form-input">Foto:
         <input type="file" name="FotoToUpload" id="fileToUpload">
    </div>
    <div>
      <input type="Submit" name="submit" value="Submit" class="submit-button">
    </div>
  </form>
</section>
