<?php
session_start();

date_default_timezone_set('Asia/Manila');

$userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : null;

function buildLikeButton($postID)
{
    global $userID;

    if (!$userID) {
        return "
        <button class='btn btn-like' data-bs-toggle='modal' data-bs-target='#loginModal' enable>
          <i class='bi bi-hand-thumbs-up' style='color: var(--clr-light-orange)'></i>
        </button>";
    }

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
}
function buildBookmarkButton($postID)
{
    global $userID;

    if (!$userID) {
        return "
        <button class='btn btn-bookmark' data-bs-toggle='modal' data-bs-target='#loginModal' enable>
          <i class='bi bi-bookmark' style='color: var(--clr-light-orange)'></i>
        </button>";
    }

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

function buildReportButton($postID)
{
    global $userID;

    if (!$userID) {
        return "
        <button class='btn btn-report' data-bs-toggle='modal' data-bs-target='#loginModal' enable>
          <i class='bi bi-flag' style='color: var(--clr-light-orange)'></i>
        </button>";
    }

    $queryReportPost = "SELECT * FROM reports WHERE postID = {$postID} AND userID = {$userID}";
    $resultReportPost = executeQuery($queryReportPost);

    $reportedClass = mysqli_num_rows($resultReportPost) > 0 ? "reported" : "";
    $reportedIcon = mysqli_num_rows($resultReportPost) > 0 ? "bi-flag-fill" : "bi-flag";

    return "
      <form method='POST' action=''>
          <button type='submit' name='reportAction' value='{$postID}' class='btn btn-like {$reportedClass}'>
              <i class='bi {$reportedIcon}' style='color: var(--clr-light-orange)'></i>
          </button>
      </form>";
}

if (isset($_POST['likeAction']) && $userID) {
    $postID = $_POST['likeAction'];

    $checkLikeQuery = "SELECT * FROM likes WHERE postID = {$postID} AND userID = {$userID}";
    $checkLikeResult = executeQuery($checkLikeQuery);

    if (mysqli_num_rows($checkLikeResult) > 0) {
        $deleteLikeQuery = "DELETE FROM likes WHERE postID = {$postID} AND userID = {$userID}";
        executeQuery($deleteLikeQuery);
    } else {
        $insertLikeQuery = "INSERT INTO likes (postID, userID) VALUES ({$postID}, {$userID})";
        executeQuery($insertLikeQuery);
    }

    header("Location: " . $_SERVER['REQUEST_URI']);
    exit;
}
if (isset($_POST['bookmarkAction']) && $userID) {
    $postID = $_POST['bookmarkAction'];

    $checkBookmarkQuery = "SELECT * FROM bookmarks WHERE postID = {$postID} AND userID = {$userID}";
    $checkBookmarkResult = executeQuery($checkBookmarkQuery);

    if (mysqli_num_rows($checkBookmarkResult) > 0) {
        $deleteBookmarkQuery = "DELETE FROM bookmarks WHERE postID = {$postID} AND userID = {$userID}";
        executeQuery($deleteBookmarkQuery);
    } else {
        $insertBookmarkQuery = "INSERT INTO bookmarks (postID, userID) VALUES ({$postID}, {$userID})";
        executeQuery($insertBookmarkQuery);
    }

    header("Location: " . $_SERVER['REQUEST_URI']);
    exit;
}

if (isset($_POST['reportAction']) && $userID) {
    $postID = $_POST['reportAction'];

    $checkReportQuery = "SELECT * FROM reports WHERE postID = {$postID} AND userID = {$userID}";
    $checkReportResult = executeQuery($checkReportQuery);

    if (mysqli_num_rows($checkReportResult) > 0) {
        $deleteReportQuery = "DELETE FROM reports WHERE postID = {$postID} AND userID = {$userID}";
        executeQuery($deleteReportQuery);
    } else {
        $insertReportQuery = "INSERT INTO reports (postID, userID) VALUES ({$postID}, {$userID})";
        executeQuery($insertReportQuery);
    }

    header("Location: " . $_SERVER['REQUEST_URI']);
    exit;
}

?>