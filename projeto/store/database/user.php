<?php
  function createUser($username, $password) {
    global $conn;  
    
    $stmt = $conn->prepare('INSERT INTO user (username, password) VALUES (?, ?)');
    $stmt->execute(array($username, $password));
  }

  function verifyUser($username, $password) {
    global $conn;  
    
    $stmt = $conn->prepare('SELECT * FROM user WHERE username = ? AND password = ?');
    $stmt->execute(array($username, $password));
    return ($stmt->fetch() !== false);
  }

?>
