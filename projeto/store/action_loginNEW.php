<?php
  include_once('config/init.php');
  
  $username = trim(strip_tags($_POST['username']));
  $password = $_POST['password'];  
  
  $stmt = $conn->prepare('SELECT * FROM user WHERE username = ?');
  $stmt->execute(array($username));
  $userResult = $stmt->fetch();
  
  /*Php library*/
  $passwordResult = password_verify($password, $userResult['password']);


  if ($userResult !== false && $passwordResult) 
  {
    $_SESSION['username'] = $username;
    header('Location: index.php');
  }
  else
  {
  	echo "Log in failed! Incorrect Username or password! ";
  }
?>
