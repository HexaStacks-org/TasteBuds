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
        SELECT recipes.*, 
            users.*, 
            images.*, 
            primaryfoodcategories.*, 
            foodSubcategories.*, 
            (SELECT COUNT(likeID) FROM likes WHERE likes.recipeID = recipes.recipeID) AS likesCount,
            (SELECT COUNT(bookmarkID) FROM bookmarks WHERE bookmarks.recipeID = recipes.recipeID) AS bookmarksCount
        FROM recipes
        LEFT JOIN users ON users.userID = recipes.userID
        LEFT JOIN images ON images.recipeID = recipes.recipeID
        LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = recipes.primaryCategoryID
        LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = recipes.subcategoryID
        WHERE 1=1";

if ($searchText != '') {
    $query .= " AND (recipeTitle LIKE '$searchText%')";
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
            $query .= " ORDER BY recipeTitle ASC";
            break;
        case 'Z-A':
            $query .= " ORDER BY recipeTitle DESC";
            break;
        case 'likes':
            $query .= " ORDER BY likesCount DESC";
            break;
        case 'bookmarks':
            $query .= " ORDER BY bookmarksCount DESC";
            break;
    }
}

$resultRecipes = executeQuery($query);

$primaryCategoryQuery = "SELECT DISTINCT(primaryCategoryName) FROM primaryFoodCategories";
$primaryCategoryResults = executeQuery($primaryCategoryQuery);

$subcategoryQuery = "SELECT DISTINCT(subcategoryName) FROM foodSubcategories";
$subcategoryResults = executeQuery($subcategoryQuery);
?>