<?php
session_start();

$userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : null;

$queryUserIndividual = "
    SELECT DISTINCT users.userID, users.firstName, users.lastName
    FROM recipes
    LEFT JOIN users ON users.userID = recipes.userID
    WHERE recipes.userID = $userID;
";

$resultUserIndividual = executeQuery($queryUserIndividual);

$queryUserUpContentRcIndividual = "
    SELECT recipes.*, users.userID AS userCreatorID, users.firstName, users.lastName
    FROM recipes
    LEFT JOIN users ON users.userID = recipes.userID
    WHERE recipes.userID = $userID;
";

$resultUserUpContentRcIndividual = executeQuery($queryUserUpContentRcIndividual);

$queryUserUpContentGpIndividual = "
    SELECT galleryposts.*, users.userID AS userCreatorID, users.firstName, users.lastName
    FROM galleryposts
    LEFT JOIN users ON users.userID = galleryposts.userID
    WHERE galleryposts.userID = $userID;
";

$resultUserUpContentGpIndividual = executeQuery($queryUserUpContentGpIndividual);

if (isset($_POST['btnDeleteGallery'])) {
    $postID = $_POST['postID'];
    // Debugging: print galleryID to check if it's correct
    error_log("Post ID: " . $postID);

    $deleteGalleryQuery = "DELETE FROM galleryposts WHERE postID = $postID";
    $deleteGalleryResult = executeQuery($deleteGalleryQuery);

    if ($deleteGalleryResult) {
        header("Location: adminEditContent.php");
        exit;
    } else {
        echo "Error deleting gallery post.";
    }
}

if (isset($_POST['btnDeleteRecipe'])) {
    $recipeID = $_POST['recipeID'];
    // Debugging: print recipeID to check if it's correct
    error_log("Recipe ID: " . $recipeID);

    $deleteRecipeQuery = "DELETE FROM recipes WHERE recipeID = $recipeID";
    $deleteRecipeResult = executeQuery($deleteRecipeQuery);

    if ($deleteRecipeResult) {
        header("Location: adminEditContent.php");
        exit;
    } else {
        echo "Error deleting recipe.";
    }
}
?>