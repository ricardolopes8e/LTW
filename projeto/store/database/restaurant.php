<?php
  function getAllRestaurants() {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM restaurant');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getRestaurant_image($restaurant_id) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM image_restaurant WHERE id_restaurant = ?');
    $stmt->execute();
    return $stmt->fetch();
  }

  function getRestaurant($restaurant_id) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM restaurant WHERE id = ?');
    $stmt->execute(array($restaurant_id));
    return $stmt->fetchAll();
  }

  function getRestaurant_by_name($restaurant_id) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM restaurant WHERE name = ?');
    $stmt->execute(array($restaurant_id));
    return $stmt->fetch();
  }

  function createRestaurant($name) {
    global $conn;

    $stmt = $conn->prepare('INSERT INTO restaurant VALUES (NULL, ?)');
    $stmt->execute(array($name));
    return $stmt->fetch();
  }
?>
