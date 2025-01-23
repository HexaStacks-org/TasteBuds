<?php
include("../../connect.php");

if (isset($_POST['btnSubmit'])) {
    // Sanitize form data
    $recipeTitle = $_POST['title'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];
    $steps = $_POST['steps'];
    $primaryCategoryID = $_POST['flexRadioPrimary'];
    $subcategoryID = $_POST['flexRadioSecondary'];

    // Check if both category and subcategory are selected
    if ($primaryCategoryID && $subcategoryID) {
        // Insert recipe
        $insertRecipeQuery = "
            INSERT INTO recipes (recipeTitle, description, ingredients, steps, primaryCategoryID, subcategoryID)
            VALUES ('$recipeTitle', '$description', '$ingredients', '$steps', '$primaryCategoryID', '$subcategoryID')
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

    // Fetch gallery posts with images
    $fetchRecipeQuery = "
        SELECT g.postID, g.caption, i.imageURL 
        FROM galleryposts g
        LEFT JOIN images i ON g.postID = i.postID
        WHERE g.userID = '$userId' AND g.isApproved = 1
    ";
    
    $result = mysqli_query($conn, $fetchRecipeQuery);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>" . $row['caption'] . "</p>";
            if ($row['imageURL']) {
                echo "<img src='../../shared/assets/image/content-image/" . $row['imageURL'] . "' alt='Recipe Image'>";
            }
        }
    } else {
        echo "No posts available.";
    }

    // Redirect to gallery page
    header("Location: ../../recipeView.php");
    exit;
}
?>
