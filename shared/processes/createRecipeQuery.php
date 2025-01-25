<?php
include("connect.php");  
session_start();

// Check if user is logged in
if (!isset($_SESSION['userID'])) {
    die("User not logged in.");
}

if (isset($_POST['btnSubmit'])) {
    // Sanitize form data
    $recipeTitle = $_POST['title'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];
    $steps = $_POST['steps'];
    $primaryCategoryID = $_POST['flexRadioPrimary'];
    $subcategoryID = $_POST['flexRadioSecondary'];
    $userID = $_SESSION['userID']; // Get the user ID from the session

    // Get user role from the database
    $userQuery = "SELECT role FROM users WHERE userID = '$userID' LIMIT 1";
    $userResult = mysqli_query($conn, $userQuery);
    $userRole = mysqli_fetch_assoc($userResult)['role'];

    // Determine approval status
    $isApproved = ($userID == 1 || $userRole == 'admin') ? 'Yes' : 'No';

    // Check if both category and subcategory are selected
    if ($primaryCategoryID && $subcategoryID) {
        // Insert recipe and set updatedAt to NULL explicitly
        $insertRecipeQuery = "
            INSERT INTO recipes (recipeTitle, description, ingredients, steps, primaryCategoryID, subcategoryID, userID, isApproved, updatedAt)
            VALUES ('$recipeTitle', '$description', '$ingredients', '$steps', '$primaryCategoryID', '$subcategoryID', '$userID', '$isApproved', NULL)
        ";

        if (mysqli_query($conn, $insertRecipeQuery)) {
            echo "Recipe added successfully!";
        } else {
            echo "Error adding recipe.";
        }
    } else {
        echo "Please select a valid category and subcategory.";
        exit;
    }

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['image']['name'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExt, $allowedExts)) {
            $newFileName = date("YMdHisu") . "." . $fileExt;
            $uploadDir = "../../shared/assets/image/content-image/";

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $newFileName)) {
                $insertImageQuery = "
                    INSERT INTO images (recipeID, imageURL)
                    VALUES ((SELECT recipeID FROM recipes WHERE recipeTitle = '$recipeTitle' LIMIT 1), '$newFileName')
                ";
                mysqli_query($conn, $insertImageQuery);
            } else {
                echo "Error moving the file.";
            }
        } else {
            echo "Invalid file type.";
        }
    }

    // Insert gallery post
    if (isset($_POST['caption'])) {
        $caption = $_POST['caption'];

        if ($primaryCategoryID && $subcategoryID) {
            $insertGalleryQuery = "
                INSERT INTO galleryposts (caption, userID, isApproved, primaryCategoryID, subcategoryID, updatedAt) 
                VALUES ('$caption', '$userID', '$isApproved', '$primaryCategoryID', '$subcategoryID', NULL)
            ";
            if (mysqli_query($conn, $insertGalleryQuery)) {
                echo "Gallery post added successfully!";
            } else {
                echo "Error adding gallery post.";
            }
        } else {
            echo "Please select a valid category and subcategory for gallery post.";
            exit;
        }
    }

    // Redirect after success
    header("Location: ../../users/recipeView.php");
    exit();
}

// Fetch gallery posts and display with "Yes" for isApproved
$fetchGalleryQuery = "
    SELECT g.postID, g.caption, i.imageURL, g.isApproved
    FROM galleryposts g
    LEFT JOIN images i ON g.postID = i.postID
    WHERE g.userID = '{$_SESSION['userID']}'
";
?>