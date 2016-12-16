<?php
  function createUser($username, $password) {
    global $conn;  
	
	$stmt = $conn->prepare(
		'SELECT * FROM user
		WHERE username = ?');
	$stmt->execute(array($username));
	
	if ($stmt->fetch()) {
		//$_SESSION['responseContent'] = 'That username is already taken.';
		$message = "That username is already taken.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('Location: list_restaurants.php');
		exit();
	}
	 else 
		 $stmt = $conn->prepare('INSERT INTO user (username, password) VALUES (?, ?)');
		 $stmt->execute(array($username, $password));

  }


  function verifyUser($username, $password) {
    global $conn;  
    
    $stmt = $conn->prepare('SELECT * FROM user WHERE username = ? AND password = ?');
    $stmt->execute(array($username, $password));
    return ($stmt->fetch() !== false);
  }
  
  function change_username($new_username, $current_username) {
	  global $conn; 

	$stmt = $conn->prepare(
		'SELECT * FROM user
		WHERE username = ?');
	$stmt->execute(array($new_username));
	
	if ($stmt->fetch()) {
		$_SESSION['responseContent'] = 'That username is already taken.';
		header('Location: list_restaurants.php');
		exit();
	}
	else {
		$stmt = $conn->prepare('UPDATE user SET username = ? WHERE username = ?');
		$stmt->execute(array($new_username, $current_username));
	}
  }
  function change_firstname($new_firstname, $current_firstname){
	  global $conn; 
	
	$stmt = $conn->prepare(
		'SELECT * FROM user 
		WHERE firstname = ?');
	$stmt->execute(array($new_firstname));
	
	if ($stmt->fetch()) {
		$_SESSION['responseContent'] = 'That firstname is already taken.';
		header('Location: list_restaurants.php');
		exit();
	}
	else {
		$stmt = $conn->prepare(
		'UPDATE user SET firstname = ? 
		WHERE firstname = ?');
		$stmt->execute(array($new_firstname, $current_firstname));
	}
  }
  function change_secondname($new_secondname, $current_secondname){
	  global $conn; 
	
		$stmt = $conn->prepare(
		'SELECT * FROM user 
		WHERE secondname = ?');
	$stmt->execute(array($new_secondname));
	
	if ($stmt->fetch()) {
		$_SESSION['responseContent'] = 'That secondname is already taken.';
		header('Location: list_restaurants.php');
		exit();
	}
	else {
		$stmt = $conn->prepare('UPDATE user SET secondname = ? WHERE secondname = ?');
		$stmt->execute(array($new_secondname, $current_secondname));
	}  
  }
  
  function get_username($username){
	  
	  
	   return ($stmt->fetch())
  }
 /* function change_password($new_password, $current_password){
	 global $conn; 
	
		$stmt = $conn->prepare(
		'SELECT * FROM user 
		WHERE secondname = ?');
	$stmt->execute(array($new_secondname));
	
	if ($stmt->fetch()) {
		$_SESSION['responseContent'] = 'That secondname is already taken.';
		header('Location: list_restaurants.php');
		exit();
	}
	else {
		$stmt = $conn->prepare
		('UPDATE user SET secondname = ? 
		WHERE secondname = ?');
		$stmt->execute(array($new_secondname, $current_secondname));
	}  
	  
  }*/

?>
