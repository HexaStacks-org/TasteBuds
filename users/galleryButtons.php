<?php
session_start();

date_default_timezone_set('Asia/Manila');


$userID = $_SESSION['userID'];
// Update the function to accept only one argument (postID)
function buildLikeButton($postID, $userID)
{
    // Check if the user has already liked the post
    $queryLikePost = "SELECT * FROM likes WHERE postID = {$postID} AND userID = {$userID}";
    $resultLikePost = executeQuery($queryLikePost);

    $likedClass = mysqli_num_rows($resultLikePost) > 0 ? "liked" : "";
    $likedIcon = mysqli_num_rows($resultLikePost) > 0 ? "bi-hand-thumbs-up-fill" : "bi-hand-thumbs-up";

    return "
    <form method='POST' action=''>
      <button type='submit' name='likeAction' value='{$postID}' class='btn btn-like {$likedClass}'>
        <i class='bi {$likedIcon}' style='color: var(--clr-light-orange)'></i>
      </button>
    </form>";
    ;
}


// Bookmark Button functionality
function buildBookmarkButton($postID, $userID)
{
    // Check if the user has already bookmarked the post
    $queryBookmarkPost = "SELECT * FROM bookmarks WHERE postID = {$postID} AND userID = {$userID}";
    $resultBookmarkPost = executeQuery($queryBookmarkPost);

    $bookmarkedClass = mysqli_num_rows($resultBookmarkPost) > 0 ? "bookmarked" : "";
    $bookmarkIcon = mysqli_num_rows($resultBookmarkPost) > 0 ? "bi-bookmark-fill" : "bi-bookmark";

    return "
    <form method='POST' action=''>
      <button type='submit' name='bookmarkAction' value='{$postID}' class='btn btn-bookmark mx-1 {$bookmarkedClass}'>
        <i class='bi {$bookmarkIcon}' style='color: var(--clr-light-orange)'></i>
      </button>
    </form>";
}

// Handle Like or Bookmark action
if (isset($_POST['likeAction'])) {
    $postID = $_POST['likeAction'];

    // Check if the like already exists
    $checkLikeQuery = "SELECT * FROM likes WHERE postID = {$postID} AND userID = {$userID}";
    $checkLikeResult = executeQuery($checkLikeQuery);

    if (mysqli_num_rows($checkLikeResult) > 0) {
        // Remove like
        $deleteLikeQuery = "DELETE FROM likes WHERE postID = {$postID} AND userID = {$userID}";
        executeQuery($deleteLikeQuery);
    } else {
        // Add like
        $insertLikeQuery = "INSERT INTO likes (postID, userID) VALUES ({$postID}, {$userID})";
        executeQuery($insertLikeQuery);
    }
}

if (isset($_POST['bookmarkAction'])) {
    $postID = $_POST['bookmarkAction'];

    // Check if the bookmark already exists
    $checkBookmarkQuery = "SELECT * FROM bookmarks WHERE postID = {$postID} AND userID = {$userID}";
    $checkBookmarkResult = executeQuery($checkBookmarkQuery);

    if (mysqli_num_rows($checkBookmarkResult) > 0) {
        // Remove bookmark
        $deleteBookmarkQuery = "DELETE FROM bookmarks WHERE postID = {$postID} AND userID = {$userID}";
        executeQuery($deleteBookmarkQuery);
    } else {
        // Add bookmark
        $insertBookmarkQuery = "INSERT INTO bookmarks (postID, userID) VALUES ({$postID}, {$userID})";
        executeQuery($insertBookmarkQuery);
    }
}
?>