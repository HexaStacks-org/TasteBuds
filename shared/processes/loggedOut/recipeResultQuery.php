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
    SELECT recipes.recipeID, 
    recipes.*,
            users.*, 
            images.*, 
            primaryfoodcategories.*, 
            foodSubcategories.*, 
            COUNT(likes.likeID) AS likesCount,
            COUNT(bookmarks.bookmarkID) AS bookmarksCount
     FROM recipes
     LEFT JOIN users ON users.userID = recipes.userID
     LEFT JOIN images ON images.postID = recipes.postID
     LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = recipes.primaryCategoryID
     LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = recipes.subcategoryID
     LEFT JOIN likes ON likes.recipeID = recipes.recipeID
     LEFT JOIN bookmarks ON bookmarks.recipeID = recipes.recipeID
     GROUP BY recipes.recipeID";

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