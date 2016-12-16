<?php
  include_once('config/init.php');
  include_once('database/user.php');
   try {
	     $username = trim(strip_tags($_POST['username']));
		 $password = sha1($_POST['password']);  

	   createUser($username, $password);
	   header('Location: mainpage.php');  
   } 
   catch(PDOException $e){
	   echo $e->getMessage();
	   }
  
?>
