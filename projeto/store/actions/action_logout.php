<?php
  include_once('config/init.php');

  session_unset();
  session_destroy();
  
  session_start();
  
  header("Location: index.php");
  exit;
?>
