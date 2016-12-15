<?php
  include_once('config/init.php');
  include_once('database/user.php');
   try {
	   $username = trim(strip_tags($_POST['username']));
	   $password = $_POST['password'];  

	   createUser($username, $password);
	   header('Location: list_restaurants.php');  
   } 
   catch(PDOException $e){
	   echo $e->getMessage();
	   }
  
?>
