<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../users/index.php");
}

if (isset($_GET['role'])) {
    $requestedUserRole = $_GET['role'];
}
?>