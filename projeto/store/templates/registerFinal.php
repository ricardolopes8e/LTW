<section id="content">
  <h2>Register</h2>
  <form action="register_action.php" method="post">
    <div class="form-input">Username:
        <input type="text" name="username" placeholder="Enter username">
    </div>
    <div class="form-input">Password:
        <input type="password" name="password" placeholder="Enter password">
    </div>
    <div class="form-input">Email:
        <input type="email" name="email" placeholder=" ex: luis123@fe.up.pt">
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
