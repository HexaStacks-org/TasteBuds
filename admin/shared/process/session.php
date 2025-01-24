<?php
include("../connect.php");
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
}

if (isset($_GET['role'])) {
    $requestedUserRole = $_GET['role'];
}
?>