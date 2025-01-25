<?php
include("connect.php");

session_start(); // Start the session
date_default_timezone_set('Asia/Manila');

// Check if the user is logged in
if (empty($_SESSION['userID'])) {
    // Redirect to login if no session is found
    header("Location: login.php");
    exit;
}

// Use the userID from the session
$userID = $_SESSION['userID'];

$recipeID = $_GET['recipeID'];

// Fetch the recipe details from the database using a prepared statement
$queryRecipeContent = "
    SELECT *
    FROM recipes
    WHERE recipeID = ? AND userID = ?
";
$stmt = $conn->prepare($queryRecipeContent);
$stmt->bind_param("ii", $recipeID, $userID);
$stmt->execute();
$resultRecipeContent = $stmt->get_result();

// Check if the recipe exists
if (mysqli_num_rows($resultRecipeContent) > 0) {
    $recipeRowContent = mysqli_fetch_assoc($resultRecipeContent); // Fetch recipe details
} else {
    echo "<div class='alert alert-danger'>Recipe not found or you are not authorized to edit this recipe.</div>";
    exit; // Stop further execution
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission
    $recipeTitle = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
    $steps = mysqli_real_escape_string($conn, $_POST['steps']);
    $currentTimestamp = date('Y-m-d H:i:s');

    // Update the recipe in the database using a prepared statement
    $updateRecipeQuery = "
        UPDATE recipes 
        SET recipeTitle = '$recipeTitle', description = '$description', ingredients = '$ingredients', steps = '$steps', updatedAt = '$currentTimestamp'
        WHERE recipeID = $recipeID AND userID = $userID
    ";
    $updateRecipeResult = executeQuery($updateRecipeQuery);

    if ($updateRecipeResult) {
        // Redirect to the updated recipe page after successful update
        header("Location: ../../adminEditContent.php");
        exit; // Ensure the script stops executing after the redirect
    } else {
        echo "<div class='alert alert-danger'>Error updating recipe. Please try again.</div>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create a Recipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rammetto+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/createRecipe.css">
    <link rel="icon" type="image" href="../../../shared/assets/image/TasteBuds_Icon.png">
</head>

<body>
    <div>
        <div class="container-fluid px-0">
            <div class="row g-0 align-items-start">
                <div class="col-md-6 col-12">
                    <div class="recipe-form mx-3 my-3 px-5">
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <img src="../../../shared/assets/image/Logo Combination 1.png"
                                    class="logo d-inline-block align-text-top" />
                            </div>
                            <div class="con-back col d-flex align-items-center">
                                <a href="../../adminEditContent.php" id="back-btn" class="btn back-btn">BACK</a>
                            </div>
                        </div>
                        <h1 class="px-5">Create a Recipe</h1>
                        <p class="recipe-description px-5">Share your new favorite and must-try recipe!</p>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="mb-3 mx-5">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="<?php echo $recipeRowContent['recipeTitle']; ?>" required>
                            </div>

                            <div class="mb-3 mx-5">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control py-3" id="description" name="description" rows="4"
                                    required><?php echo $recipeRowContent['description']; ?></textarea>
                            </div>



                            <div class="mb-3 mx-5">
                                <label for="ingredients" class="form-label">Ingredients</label>
                                <textarea class="form-control py-3" id="ingredients" name="ingredients" rows="6"
                                    required><?php echo $recipeRowContent['ingredients']; ?></textarea>
                            </div>

                            <div class="mb-3 mx-5">
                                <label for="steps" class="form-label">Steps</label>
                                <textarea class="form-control py-3" id="steps" name="steps" rows="6"
                                    required><?php echo $recipeRowContent['steps']; ?></textarea>
                            </div>

                            <div class="mx-5 my-5 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success">UPDATE RECIPE</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6 d-none d-md-block">
                    <div class="mockup-container">
                        <img src="../../../shared/assets/image/mockup-pic.png" alt="mockup" class="mockup-image">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../shared/assets/js/createRecipe.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>