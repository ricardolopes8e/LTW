<?php
  //include_once('/config/init.php');
  //include_once('/database/user.php');
 
 try
 {

  $conn = new PDO('sqlite:./food.db');
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $username = trim(strip_tags($_POST['username']));
  $password = $_POST['password'];



  $stmt = $conn->prepare('INSERT INTO user VALUES (?, ?)');
  $stmt->execute(array($username, $password));
  //createUser($username, $password);
  
  header('Location: list_categories_head.php');

 } 
 catch(PDOException $e){
 	echo $e->getMessage();
 }
  
?>