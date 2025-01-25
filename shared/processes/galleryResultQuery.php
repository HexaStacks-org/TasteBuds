<?php

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
           (SELECT COUNT(likeID) FROM likes WHERE likes.postID = galleryposts.postID) AS likesCount,
           (SELECT COUNT(bookmarkID) FROM bookmarks WHERE bookmarks.postID = galleryposts.postID) AS bookmarksCount
    FROM galleryposts
    LEFT JOIN users ON users.userID = galleryposts.userID
    LEFT JOIN images ON images.postID = galleryposts.postID
    LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = galleryposts.primaryCategoryID
    LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = galleryposts.subcategoryID
    WHERE galleryposts.isApproved = 'yes'";

if ($searchText != '') {
    $query .= " AND (caption LIKE '%$searchText%')";
}

if ($primaryCategory != '') {
    $query .= " AND primaryCategoryName = '$primaryCategory'";
}

if ($secondaryCategory != '') {
    $query .= " AND subcategoryName = '$secondaryCategory'";
}

$query .= " GROUP BY galleryposts.postID";

if ($orderBy != '') {
    switch ($orderBy) {
        case 'alphaAsc':
            $query .= " ORDER BY caption ASC";
            break;
        case 'alphaDesc':
            $query .= " ORDER BY caption DESC";
            break;
        case 'likes':
            $query .= " ORDER BY likesCount DESC";
            break;
        case 'bookmarks':
            $query .= " ORDER BY bookmarksCount DESC";
            break;
        case 'creation':
            $query .= " ORDER BY recipes.creationDate DESC";
            break;
        case 'update':
            $query .= " ORDER BY recipes.updateDate DESC";
            break;
    }
}

$resultPosts = executeQuery($query);

$primaryCategoryQuery = "SELECT DISTINCT(primaryCategoryName) FROM primaryFoodCategories";
$primaryCategoryResults = executeQuery($primaryCategoryQuery);

$subcategoryQuery = "SELECT DISTINCT(subcategoryName) FROM foodSubcategories";
$subcategoryResults = executeQuery($subcategoryQuery);
?>