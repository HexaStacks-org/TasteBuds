<?php
include("admin/shared/components/connect.php");

// LIKE & BOOKMARK OF GALLERY
$galleryQuery = "SELECT galleryposts.*, users.*, images.*, primaryfoodcategories.*, foodSubcategories.*, 
(SELECT COUNT(likeID) FROM likes WHERE likes.postID = galleryposts.postID) AS likesCount, 
(SELECT COUNT(bookmarkID) FROM bookmarks WHERE bookmarks.postID = galleryposts.postID) AS bookmarksCount FROM galleryposts 
LEFT JOIN users ON users.userID = galleryposts.userID LEFT JOIN images ON images.postID = galleryposts.postID 
LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = galleryposts.primaryCategoryID 
LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = galleryposts.subcategoryID";

// QUERIES FOR FILTER AND SORT OF GALLERY POST
$primaryCategoryFilter = isset($_GET['primaryCategoryName']) ? $_GET['primaryCategoryName'] : '';
$subcategoryFilter = isset($_GET['subcategoryName']) ? $_GET['subcategoryName'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
$order = isset($_GET['order']) ? $_GET['order'] : '';

if ($primaryCategoryFilter != '' || $subcategoryFilter != '') {
    $galleryQuery = $galleryQuery . " WHERE";

    if ($primaryCategoryFilter != '') {
        $galleryQuery = $galleryQuery . " primaryCategoryName='$primaryCategoryFilter'";
    }

    if ($primaryCategoryFilter != '' && $subcategoryFilter != '') {
        $galleryQuery = $galleryQuery . " AND";
    }

    if ($subcategoryFilter != '') {
        $galleryQuery = $galleryQuery . " subcategoryName='$subcategoryFilter'";
    }
}

if ($sort != '') {
    $galleryQuery = $galleryQuery . " ORDER BY $sort";

    if ($order != '') {
        $galleryQuery = $galleryQuery . " $order";
    }
}

if (isset($_GET['btnReset'])) {
    header('Location: shared/process/insightsAnalyticsTable.php');
}

$galleryResult = executeQuery($galleryQuery);

$primaryCategoryQuery = "SELECT DISTINCT(primaryCategoryName) FROM primaryFoodCategories";
$primaryCategoryResults = executeQuery($primaryCategoryQuery);

$subcategoryQuery = "SELECT DISTINCT(subcategoryName) FROM foodSubcategories";
$subcategoryResults = executeQuery($subcategoryQuery);

// LIKE & BOOKMARK OF RECIPE
$recipeQuery = "SELECT recipes.*, users.*, images.*,  primaryfoodcategories.*, foodSubcategories.*, 
(SELECT COUNT(likeID) FROM likes WHERE likes.recipeID = recipes.recipeID) AS likesCount,
(SELECT COUNT(bookmarkID) FROM bookmarks WHERE bookmarks.recipeID = recipes.recipeID) AS bookmarksCount FROM recipes
LEFT JOIN users ON users.userID = recipes.userID
LEFT JOIN images ON images.recipeID = recipes.recipeID
LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = recipes.primaryCategoryID
LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = recipes.subcategoryID";

// QUERIES FOR FILTER AND SORT OF RECIPE POST
$primaryCategoryFilter = isset($_GET['primaryCategoryName']) ? $_GET['primaryCategoryName'] : '';
$subcategoryFilter = isset($_GET['subcategoryName']) ? $_GET['subcategoryName'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
$order = isset($_GET['order']) ? $_GET['order'] : '';

if ($primaryCategoryFilter != '' || $subcategoryFilter != '') {
    $recipeQuery = $recipeQuery . " WHERE";

    if ($primaryCategoryFilter != '') {
        $recipeQuery = $recipeQuery . " primaryCategoryName='$primaryCategoryFilter'";
    }

    if ($primaryCategoryFilter != '' && $subcategoryFilter != '') {
        $recipeQuery = $recipeQuery . " AND";
    }

    if ($subcategoryFilter != '') {
        $recipeQuery = $recipeQuery . " subcategoryName='$subcategoryFilter'";
    }
}

if ($sort != '') {
    $recipeQuery = $recipeQuery . " ORDER BY $sort";

    if ($order != '') {
        $recipeQuery = $recipeQuery . " $order";
    }
}

if (isset($_GET['btnReset'])) {
    header('Location: shared/process/insightsAnalyticsTable.php');
}

$recipeResult = executeQuery($recipeQuery);

$primaryCategoryQuery = "SELECT DISTINCT(primaryCategoryName) FROM primaryFoodCategories";
$primaryCategoryResults = executeQuery($primaryCategoryQuery);

$subcategoryQuery = "SELECT DISTINCT(subcategoryName) FROM foodSubcategories";
$subcategoryResults = executeQuery($subcategoryQuery);
