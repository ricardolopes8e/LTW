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

    function getRestaurant_by_name($name) {
      global $conn;

      $stmt = $conn->prepare('SELECT * FROM restaurant WHERE name = ?');
      $stmt->execute(array($name));
      return $stmt->fetchAll();
    }

    function createRestaurant($name,$description,$local, $imagePath, $id_owner) {
      global $conn;

      $stmt = $conn->prepare('INSERT INTO restaurant( name, description, local, imagePath, id_owner) VALUES (?,?,?,?,?)');
      $stmt->execute(array($name,$description,$local, $imagePath, $id_owner));
      return $stmt->fetch();
    }

    function getRestaurant_ID($name) {
      global $conn;

      $stmt = $conn->prepare('SELECT id FROM restaurant WHERE name = ?');
      $stmt->execute(array($name));
      return $stmt->fetch();
    }

    function getReview($id_restaurant, $id_rev) {
      global $conn;

      $stmt = $conn->prepare('SELECT id FROM restaurant WHERE (id_restaurant = ? and id_rev=?)');
      $stmt->execute(array($id_restaurant, $id_rev));
      return $stmt->fetch();
    }

  ?>
