<?php
  function getReviewsFromRestaurant($restaurant_id) {
    global $conn;
    
    $stmt = $conn->prepare('SELECT * FROM review WHERE restaurant_id = ?');
    $stmt->execute(array($restaurant_id));
    return $stmt->fetchAll();
  }
?>
