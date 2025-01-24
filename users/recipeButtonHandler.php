<?php
session_start();

include("../shared/processes/session.php");
date_default_timezone_set('Asia/Manila');

// Check if the user is logged in
if (!isset($_SESSION['userID'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

$userID = $_SESSION['userID'];

// Check if this is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the POST request
    $recipeID = isset($_POST['recipeID']) ? (int) $_POST['recipeID'] : 0;
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if ($action === 'like') {
        // Check if the like already exists
        $checkLikeQuery = "SELECT * FROM likes WHERE recipeID = {$recipeID} AND userID = {$userID}";
        $checkLikeResult = mysqli_query($conn, $checkLikeQuery);

        if (mysqli_num_rows($checkLikeResult) > 0) {
            // If already liked, remove the like
            $deleteLikeQuery = "DELETE FROM likes WHERE recipeID = {$recipeID} AND userID = {$userID}";
            mysqli_query($conn, $deleteLikeQuery);
        } else {
            // Otherwise, add a new like
            $insertLikeQuery = "INSERT INTO likes (recipeID, userID) VALUES ({$recipeID}, {$userID})";
            mysqli_query($conn, $insertLikeQuery);
        }
    } elseif ($action === 'bookmark') {
        // Check if the bookmark already exists
        $checkBookmarkQuery = "SELECT * FROM bookmarks WHERE recipeID = {$recipeID} AND userID = {$userID}";
        $checkBookmarkResult = mysqli_query($conn, $checkBookmarkQuery);

        if (mysqli_num_rows($checkBookmarkResult) > 0) {
            // If already bookmarked, remove the bookmark
            $deleteBookmarkQuery = "DELETE FROM bookmarks WHERE recipeID = {$recipeID} AND userID = {$userID}";
            mysqli_query($conn, $deleteBookmarkQuery);
        } else {
            // Otherwise, add a new bookmark
            $insertBookmarkQuery = "INSERT INTO bookmarks (recipeID, userID) VALUES ({$recipeID}, {$userID})";
            mysqli_query($conn, $insertBookmarkQuery);
        }
    }
}

// Redirect back to the recipe page
header("Location: recipeOverview.php?recipeID=$recipeID");
exit();
?>