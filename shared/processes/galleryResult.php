<?php
include("connect.php");

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
        SELECT galleryposts.*, 
           users.*, 
           images.*, 
           primaryfoodcategories.*,
           foodSubcategories.*, 
           (SELECT COUNT(likeID) FROM likes WHERE likes.postID = galleryposts.postID) AS likesCount,
          (SELECT COUNT(bookmarkID) FROM bookmarks WHERE bookmarks.postID = galleryposts.postID) AS bookmarksCount
    FROM galleryposts
    LEFT JOIN users ON users.userID = galleryposts.userID
    LEFT JOIN images ON images.postID = galleryposts.postID
    LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = galleryposts.primaryCategoryID
    LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = galleryposts.subcategoryID
";

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