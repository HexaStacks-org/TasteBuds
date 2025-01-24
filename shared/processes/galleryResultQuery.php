<?php
include("../connect.php");

$searchText = "";
$primaryCategory = "";
$secondaryCategory = "";
$orderBy = "";
$error = "";

if (isset($_GET['searchText'])) {
    $searchText = $_GET['searchText'];
}

if (isset($_GET['primaryCategory'])) {
    $primaryCategory = $_GET['primaryCategory'];
}

if (isset($_GET['secondaryCategory'])) {
    $secondaryCategory = $_GET['secondaryCategory'];
}

if (isset($_GET['orderBy'])) {
    $orderBy = $_GET['orderBy'];
}

$query = "
        SELECT galleryposts.postID, 
            galleryposts.*, 
            users.*, 
            images.*, 
            primaryfoodcategories.*, 
            foodSubcategories.*, 
            COUNT(likes.likeID) AS likesCount,
            COUNT(bookmarks.bookmarkID) AS bookmarksCount
     FROM galleryposts
     LEFT JOIN users ON users.userID = galleryposts.userID
     LEFT JOIN images ON images.postID = galleryposts.postID
     LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = galleryposts.primaryCategoryID
     LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = galleryposts.subcategoryID
     LEFT JOIN likes ON likes.postID = galleryposts.postID
     LEFT JOIN bookmarks ON bookmarks.postID = galleryposts.postID
     GROUP BY galleryposts.postID";

if ($searchText != '') {
    $query .= " AND (caption LIKE '$searchText%')";
}

if ($primaryCategory != '') {
    $query .= " AND primaryCategoryName = '$primaryCategory'";
}

if ($secondaryCategory != '') {
    $query .= " AND subcategoryName = '$secondaryCategory'";
}

if ($orderBy != '') {
    switch ($orderBy) {
        case 'A-Z':
            $query .= " ORDER BY Caption ASC";
            break;
        case 'Z-A':
            $query .= " ORDER BY Caption DESC";
            break;
        case 'likes':
            $query .= " ORDER BY likesCount DESC";
            break;
        case 'bookmarks':
            $query .= " ORDER BY bookmarksCount DESC";
            break;
    }
}

$resultPosts = executeQuery($query);

$primaryCategoryQuery = "SELECT DISTINCT(primaryCategoryName) FROM primaryFoodCategories";
$primaryCategoryResults = executeQuery($primaryCategoryQuery);

$subcategoryQuery = "SELECT DISTINCT(subcategoryName) FROM foodSubcategories";
$subcategoryResults = executeQuery($subcategoryQuery);
?>