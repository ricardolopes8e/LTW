<section id="content">
  <h2>Add Restaurant</h2>
  <form action="action_add_restaurant.php" method="post">
    <label>Name:
      <input type="text" name="name">
    </label>
	<br>
	<label> Description: 
	  <input type="text" name="description">
	</label>
	<br>
	<label> Local: 
	  <input type="text" name="local">
	</label>
	<br>
	<form action="action_change_profile_pic.php" method="post" enctype="multipart/form-data">
        <label>New Profile Picture:
          <input type="file" name="imagePath">
        </label>
    <input type="submit">
  </form>
</section>
