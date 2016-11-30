<?php
  function createUser($username, $password) {
    global $conn;  
    
    $stmt = $conn->prepare('INSERT INTO users VALUES (?, ?)');
    $stmt->execute(array($username, $password));
  }

  function verifyUser($username, $password) {
    global $conn;  
    
    $stmt = $conn->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
    $stmt->execute(array($username, $password));
    return ($stmt->fetch() !== false);
  }

?>
