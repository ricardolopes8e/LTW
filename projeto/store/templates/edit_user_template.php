<section id="edit_user">
  <h2>Edit User</h2>
  <div class="form">
  <form action="action_change_username.php" method="post">
    <div class="form-input">New Username:
      <input type="text" name="new_username" id="new_username" placeholder="Enter new username">
    </divl>
	<input type="Submit" name="submit" value="Submit" class="submit-button">
  </form>
</div>
<div class="form">
  <form action="action_change_password.php" method="post">
    <div class="form-input">New Password:
      <input type="password" name="new_password" id="new_password" placeholder="Enter new password">
	</divl>
	<div class="form-input">Confirmation:
	  <input type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="Confirm password">
	</divl>
    <input type="Submit" name="submit" value="Submit" class="submit-button">
	</form>
</div>
<div class="form1">
   <form action="action_change_email.php" method="post">
	<div class="form-input">New Email:
      <input type="email" name="new_email" id="new_email" placeholder="Enter new email">
    </divl>
	<input type="Submit" name="submit" value="Submit" class="submit-button">
   </form>
 </div>
  <?php /*
    <form action="action_change_description.php" method="post">
	<div class="form-input">New Description:
      <input type="text" name="new_description" id="new_description" placeholder="Enter new description">
    </divl>
    <input type="Submit" name="submit" value="Submit" class="submit-button">
   </form>*/?>
<div class="form2">
  <form action="action_change_profile_pic.php" method="post" enctype="multipart/form-data">
        	<div class="form-input">New Profile Picture:
          <input type="file" name="FotoToUpload" id="fileToUpload">
        </divl>
		<input type="Submit" name="submit" value="Submit" class="submit-button">
   </form>
 </div>
   <div id="MainPage">
   <a href="index.php"><center>Main Page</center></a>
   </divl>
</section>
