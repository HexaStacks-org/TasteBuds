<?php
session_start();

date_default_timezone_set('Asia/Manila');

// Update the function to accept only one argument (postID)
function buildLikeButton($postID)
{
    // Check if the user has already liked the post
    $queryLikePost = "SELECT * FROM likes WHERE postID = {$postID}";
    $resultLikePost = executeQuery($queryLikePost);

    $likedClass = mysqli_num_rows($resultLikePost) > 0 ? "liked" : "";

    return "
    <form method='POST' action=''>
      <button type='submit' name='likeAction' value='{$postID}' class='btn btn-like {$likedClass}'><i class='bi bi-hand-thumbs-up-fill' style='color: var(--clr-light-orange)'></i>
      </button>
    </form>";
}

// Bookmark Button functionality
function buildBookmarkButton($postID)
{
    // Check if the user has already bookmarked the post
    $queryBookmarkPost = "SELECT * FROM bookmarks WHERE postID = {$postID}";
    $resultBookmarkPost = executeQuery($queryBookmarkPost);

    $bookmarkedClass = mysqli_num_rows($resultBookmarkPost) > 0 ? "bookmarked" : "";

    return "
    <form method='POST' action=''>
      <button type='submit' name='bookmarkAction' value='{$postID}' class='btn btn-bookmark mx-1 {$bookmarkedClass}'><i class='bi bi-bookmark-fill' style='color: var(--clr-light-orange)'></i>
      </button>
    </form>";
}

// Handle Like or Bookmark action
if (isset($_POST['likeAction'])) {
    $postID = $_POST['likeAction'];

    // Check if the like already exists
    $checkLikeQuery = "SELECT * FROM likes WHERE postID = {$postID}";
    $checkLikeResult = executeQuery($checkLikeQuery);

    if (mysqli_num_rows($checkLikeResult) > 0) {
        // Remove like
        $deleteLikeQuery = "DELETE FROM likes WHERE postID = {$postID}";
        executeQuery($deleteLikeQuery);
    } else {
        // Add like
        $insertLikeQuery = "INSERT INTO likes (postID) VALUES ({$postID})";
        executeQuery($insertLikeQuery);
    }
}

if (isset($_POST['bookmarkAction'])) {
    $postID = $_POST['bookmarkAction'];

    // Check if the bookmark already exists
    $checkBookmarkQuery = "SELECT * FROM bookmarks WHERE postID = {$postID}";
    $checkBookmarkResult = executeQuery($checkBookmarkQuery);

    if (mysqli_num_rows($checkBookmarkResult) > 0) {
        // Remove bookmark
        $deleteBookmarkQuery = "DELETE FROM bookmarks WHERE postID = {$postID}";
        executeQuery($deleteBookmarkQuery);
    } else {
        // Add bookmark
        $insertBookmarkQuery = "INSERT INTO bookmarks (postID) VALUES ({$postID})";
        executeQuery($insertBookmarkQuery);
    }
}
?>