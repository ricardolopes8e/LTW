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
		header('Location: register.php');
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
		header('Location: edit_user.php');
		exit();
	}
	else {
		$stmt = $conn->prepare('UPDATE user SET username = ? WHERE username = ?');
		$stmt->execute(array($new_username, $current_username));
	}
  }
  function change_email($new_email, $current_username){
	  global $conn; 
	
		$stmt = $conn->prepare(
		'UPDATE user SET email = ? 
		WHERE username = ?');
		$stmt->execute(array($new_email, $current_username));

  }
  function change_description($new_description, $current_username){
	  global $conn; 
	
		$stmt = $conn->prepare(
		'UPDATE user SET description = ? 
		WHERE username = ?');
		$stmt->execute(array($new_description, $current_username));
	
  }
	function searchUsers($search){
		global $conn;
		$stmt = $conn->prepare("SELECT user.name FROM user WHERE user.name LIKE '%$search%'");
		$stmt->execute();
		$result =  $stmt->fetchAll();
	return $result;
	}


?>
