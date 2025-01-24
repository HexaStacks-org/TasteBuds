<?php
include("../connect.php");
session_start();

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];

    // SQL query to get user information (first name, last name)
    $queryUserIndividual = "
    SELECT DISTINCT users.userID, users.firstName, users.lastName
    FROM recipes
    LEFT JOIN users ON users.userID = recipes.userID
    WHERE recipes.userID = $userID;
    ";

    $resultUserIndividual = executeQuery($queryUserIndividual);

    // SQL query to get recipes for the logged-in user
    $queryUserUpContentRcIndividual = "
    SELECT recipes.*, users.userID AS userCreatorID, users.firstName, users.lastName
    FROM recipes
    LEFT JOIN users ON users.userID = recipes.userID
    WHERE recipes.userID = $userID;
    ";

    $resultUserUpContentRcIndividual = executeQuery($queryUserUpContentRcIndividual);

    // SQL query for User UPLOADED CONTENT Records (Gallery Posts)
    $queryUserUpContentGpIndividual = "
    SELECT galleryposts.*, users.userID AS userCreatorID, users.firstName, users.lastName
    FROM galleryposts
    LEFT JOIN users ON users.userID = galleryposts.userID
    WHERE galleryposts.userID = $userID;
    ";

    $resultUserUpContentGpIndividual = executeQuery($queryUserUpContentGpIndividual);
}

// Delete gallery post
if (isset($_POST['btnDeleteGallery'])) {
    $galleryID = $_POST['galleryID'];

    // Use prepared statements for security
    $deleteGalleryQuery = "DELETE FROM galleryposts WHERE postID = ?";
    $stmt = $conn->prepare($deleteGalleryQuery);
    $stmt->bind_param("i", $galleryID);
    if ($stmt->execute()) {
        // Refresh the page
        header("Location: userContent.php");
        exit;
    }
}

// Delete recipe
if (isset($_POST['btnDeleteRecipe'])) {
    $recipeID = $_POST['recipeID'];

    // Use prepared statements for security
    $deleteRecipeQuery = "DELETE FROM recipes WHERE recipeID = ?";
    $stmt = $conn->prepare($deleteRecipeQuery);
    $stmt->bind_param("i", $recipeID);
    if ($stmt->execute()) {
        // Refresh the page
        header("Location: userContent.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - TasteBuds</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300..800&family=Rammetto+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../shared/assets/css/activityLog.css">
    <link rel="stylesheet" href="../shared/assets/css/navbar.css" />
    <link rel="stylesheet" href="../shared/assets/css/footer.css">
</head>

<body>
    <?php include("../shared/components/navbar.php") ?>

    <div class="profile-page">
        <header class="profile-header">
            <img src="../shared/assets/image/Logo.png" alt="TasteBuds Logo">
            <?php
            if (mysqli_num_rows($resultUserIndividual) > 0) {
                while ($rowUserIndividual = mysqli_fetch_assoc($resultUserIndividual)) {
                    // Display the user's full name
                    echo '<h1>' . $rowUserIndividual['firstName'] . ' ' . $rowUserIndividual['lastName'] . '</h1>';
                }
            }
            ?>
        </header>
        <main>
            <!-- Uploaded Content Section -->
            <section class="content-section">
                <h2>Uploaded Content</h2>
                <div class="content-container">

                    <!-- Recipes Section -->
                    <div class="category">
                        <h3>Recipes</h3>
                        <?php
                        if (mysqli_num_rows($resultUserUpContentRcIndividual) > 0) {
                            while ($rowUserUpContentRcIndividual = mysqli_fetch_assoc($resultUserUpContentRcIndividual)) {
                                ?>
                                <div class="item-list mb-3" id="uploaded-gallery">

                                    <div class="item">
                                        <div class="col-10">
                                            <a href="recipeOverview.php?recipeID=<?php echo $rowUserUpContentRcIndividual['recipeID']; ?>"
                                                style="text-decoration: none; color: inherit;">
                                                <span s
                                                    style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: inline-block; max-width: 80%;">
                                                    <?php echo "<i>" . $rowUserUpContentRcIndividual['createdAt'] . "</i> | " . $rowUserUpContentRcIndividual['recipeTitle']; ?>
                                                </span>
                                            </a>
                                        </div>

                                        <div class="col-1 d-flex align-items-center justify-content-center">
                                            <a href="editContentRecipe.php?recipeID=<?php echo $rowUserUpContentRcIndividual['recipeID']; ?>"
                                                class="btn btn-link p-0 me-2" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                </svg>
                                            </a>
                                        </div>

                                        <div class="col-1 d-flex align-items-center justify-content-center">
                                            <button class="btn btn-link p-0 text-danger mb-1" data-bs-toggle="modal"
                                                data-bs-target="#deleteRecipeModal"
                                                data-recipeid="<?php echo $rowUserUpContentRcIndividual['recipeID']; ?>"
                                                title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>


                    <!-- Gallery Section -->
                    <div class="category">
                        <h3>Gallery</h3>
                        <?php
                        if (mysqli_num_rows($resultUserUpContentGpIndividual) > 0) {
                            while ($rowUserUpContentGpIndividual = mysqli_fetch_assoc($resultUserUpContentGpIndividual)) {
                                ?>
                                <div class="item-list mb-3" id="uploaded-gallery">

                                    <div class="item">
                                        <div class="col-10">
                                            <!-- Change the href "postOverview" to Gallery Post View with postID -->
                                            <a href="postOverview.php?postID=<?php echo $rowUserUpContentGpIndividual['postID']; ?>"
                                                style="text-decoration: none; color: inherit;">
                                                <span
                                                    style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: inline-block; max-width: 80%;">
                                                    <?php echo "<i>" . $rowUserUpContentGpIndividual['createdAt'] . "</i> | " . $rowUserUpContentGpIndividual['caption']; ?>
                                                </span>
                                            </a>
                                        </div>

                                        <div class="col-1 d-flex align-items-center justify-content-center">
                                            <a href="edit_gallery.html?id=3" class="btn btn-link p-0 me-2" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                </svg>
                                            </a>
                                        </div>

                                        <div class="col-1 d-flex align-items-center justify-content-center">
                                            <button class="btn btn-link p-0 text-danger mb-1" data-bs-toggle="modal"
                                                data-bs-target="#deleteGalleryModal"
                                                data-galleryid="<?php echo $rowUserUpContentGpIndividual['postID']; ?>"
                                                title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- Modal for Deleting Gallery -->
    <div class="modal fade" id="deleteGalleryModal" tabindex="-1" aria-labelledby="deleteGalleryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteGalleryModalLabel">Delete Gallery Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this gallery post?</p>
                </div>
                <div class="modal-footer">
                    <form method="POST">
                        <input type="hidden" name="galleryID" id="galleryID">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="btnDeleteGallery" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Deleting Recipe -->
    <div class="modal fade" id="deleteRecipeModal" tabindex="-1" aria-labelledby="deleteRecipeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteRecipeModalLabel">Delete Recipe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this recipe?</p>
                </div>
                <div class="modal-footer">
                    <form method="POST">
                        <input type="hidden" name="recipeID" id="recipeID">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="btnDeleteRecipe" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include '../shared/components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="shared/assets/js/userContent.js"></script>
</body>

</html>