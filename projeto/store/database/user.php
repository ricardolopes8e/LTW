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
		'UPDATE user SET firstname = ? 
		WHERE username = ?');
		$stmt->execute(array($new_firstname, $current_username));

  }
  function change_secondname($new_secondname, $current_username){
	  global $conn; 
	
		$stmt = $conn->prepare(
		'UPDATE user SET secondname = ? 
		WHERE username = ?');
		$stmt->execute(array($new_secondname, $current_username));
	
  }
  function change_description($new_description, $current_username){
	  global $conn; 
	
		$stmt = $conn->prepare(
		'UPDATE user SET description = ? 
		WHERE username = ?');
		$stmt->execute(array($new_secondname, $current_username));
	
  }


?>
