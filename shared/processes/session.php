<?php
include("../connect.php");
session_start();

$userID = $_SESSION['userID'];

if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
    header("Location: ../admin/index.php");
}

if (!empty($_SESSION['userID'])) {
} else {
    header("Location: ../login.php");
}

if (isset($_GET['id'])) {
    $requestedUserID = $_GET['id'];
    $firstName = $_GET['firstName'];
}
?>