<?php
  session_start();
  
  $role = $_SESSION['role'];
  
  if (isset($_SESSION['role']) || $_SESSION[$role == 'user']) {
      header("Location: ../landing.php");
      exit();
  }
?>