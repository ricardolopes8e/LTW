<section id="edit user">
  <h2>Edit User</h2>
  <form action="action_change_username.php" method="post">
    <div class="form-input">New Username:
      <input type="text" name="new_username" id="new_username" placeholder="Enter new username">
    </divl>
	<input type="Submit" name="submit" value="Submit" class="submit-button">
  </form>
  
  <form action="action_change_password.php" method="post">
    <div class="form-input">New Password:
      <input type="password" name="new_password" id="new_password" placeholder="Enter new password">
	</divl>
	<div class="form-input">Confirmation New Password:
	  <input type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="Enter new password again">
	</divl>
    <input type="Submit" name="submit" value="Submit" class="submit-button">

	</form>	
   
   <form action="action_change_firstname.php" method="post">
	<div class="form-input">New First Name:
      <input type="text" name="new_firstname" id="new_firstname" placeholder="Enter new first name">
    </divl>
	<input type="Submit" name="submit" value="Submit" class="submit-button">
   </form>
   
   <form action="action_change_secondname.php" method="post">
	<div class="form-input">New Second Name:
      <input type="text" name="new_secondname" id="new_secondname" placeholder="Enter new second name">
    </divl>
    <input type="Submit" name="submit" value="Submit" class="submit-button">
   </form>
 
  <form action="action_change_profile_pic.php" method="post" enctype="multipart/form-data">
        <label>New Profile Picture:
          <input type="file" name="image">
        </label>
		<input type="Submit" name="submit" value="Submit" class="submit-button">
   </form>
   
   <li><a href="mainpage.php">Main Page</a></li>
</section>
