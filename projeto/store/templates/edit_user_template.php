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
   
   <form action="action_change_email.php" method="post">
	<div class="form-input">New Email:
      <input type="email" name="new_email" id="new_email" placeholder="Enter new email">
    </divl>
	<input type="Submit" name="submit" value="Submit" class="submit-button">
   </form>
  <?php /* 
    <form action="action_change_description.php" method="post">
	<div class="form-input">New Description:
      <input type="text" name="new_description" id="new_description" placeholder="Enter new description">
    </divl>
    <input type="Submit" name="submit" value="Submit" class="submit-button">
   </form>*/?>
 
  <form action="action_change_profile_pic.php" method="post" enctype="multipart/form-data">
        <label>New Profile Picture:
          <input type="file" name="FotoToUpload" id="fileToUpload">
        </label>
		<input class="registoBtn" type="submit" value="Submit">
   </form>
   
   <li><a href="index.php">Main Page</a></li>
</section>
