<?php

session_start();

$userID = $_SESSION['userID'];

if ($userID == "") {
  header("Location: ../users/index.php");
}

if (isset($_SESSION['role'])) {
  $role = $_SESSION['role'];


  if ($role == 'user') {
    header("Location: ../users/index.php");
    exit();
  }
}
?>