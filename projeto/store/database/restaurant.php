<?php
  function getAllRestaurants() {
    global $conn;
    
    $stmt = $conn->prepare('SELECT * FROM restaurant');
    $stmt->execute();
    return $stmt->fetchAll();
  }
  
  function getRestaurant($cat_id) {
    global $conn;
    
    $stmt = $conn->prepare('SELECT * FROM restaurant WHERE id = ?');
    $stmt->execute(array($cat_id));
    return $stmt->fetch();  
  }

  function createRestaurant($name) {
    global $conn;
    
    $stmt = $conn->prepare('INSERT INTO restaurant VALUES (NULL, ?)');
    $stmt->execute(array($name));
    return $stmt->fetch();  
  }
?>
