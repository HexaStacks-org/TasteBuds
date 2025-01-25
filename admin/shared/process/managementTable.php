<?php
include("shared/components/connect.php");

$moderationGallery = " SELECT *
FROM galleryposts
LEFT JOIN users ON users.userID = galleryposts.userID
LEFT JOIN images ON images.postID = galleryposts.postID
LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = galleryposts.primaryCategoryID
LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = galleryposts.subcategoryID  WHERE galleryposts.isApproved = 'no'";
$moderationGalleryResult = executeQuery($moderationGallery);

$moderationRecipe = "SELECT *
FROM recipes
LEFT JOIN users ON users.userID = recipes.userID
LEFT JOIN images ON images.recipeID = recipes.recipeID
LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = recipes.primaryCategoryID
LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = recipes.subcategoryID WHERE recipes.isApproved = 'no'";
$moderationRecipeResult = executeQuery($moderationRecipe);

$managementGallery = "SELECT galleryposts.*, users.firstName, users.lastName, 
primaryfoodcategories.primaryCategoryName, foodsubcategories.subcategoryName, 
MIN(images.imageURL) AS imageURL
FROM galleryposts
LEFT JOIN users ON galleryposts.userID = users.userID
LEFT JOIN images ON galleryposts.postID = images.postID
LEFT JOIN primaryfoodcategories ON galleryposts.primaryCategoryID = primaryfoodcategories.primaryCategoryID
LEFT JOIN foodsubcategories ON galleryposts.subcategoryID = foodsubcategories.subcategoryID
WHERE galleryposts.isApproved = 'yes'
GROUP BY galleryposts.postID;";
$managementGalleryResult = executeQuery($managementGallery);

$managementRecipe = "SELECT recipes.*, 
       users.firstName, 
       users.lastName, 
       primaryfoodcategories.primaryCategoryName, 
       foodsubcategories.subcategoryName, 
       MIN(images.imageURL) AS imageURL
FROM recipes
LEFT JOIN users ON recipes.userID = users.userID
LEFT JOIN images ON recipes.recipeID = images.recipeID
LEFT JOIN primaryfoodcategories ON recipes.primaryCategoryID = primaryfoodcategories.primaryCategoryID
LEFT JOIN foodsubcategories ON recipes.subcategoryID = foodsubcategories.subcategoryID
WHERE recipes.isApproved = 'yes'
GROUP BY recipes.recipeID;";
$managementRecipeResult = executeQuery($managementRecipe);

// Check if a POST needs to be approved or deleted
if (isset($_GET['approveID'])) {
    $postID = $_GET['approveID'];

    // Query to update the isApproved column to 'yes'
    $approveQuery = "UPDATE galleryposts SET isApproved = 'yes' WHERE postID = ?";

    // Prepare the statement to prevent SQL injection
    if ($stmt = mysqli_prepare($conn, $approveQuery)) {
        mysqli_stmt_bind_param($stmt, 'i', $postID); // 'i' means the variable is an integer
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to refresh the page and reflect the changes
            header("Location: management.php");
            exit(); // Ensure that no further code is executed after redirect
        } else {
            echo "Error approving post.";
        }
        mysqli_stmt_close($stmt);
    }
}

// Check if a post needs to be deleted
if (isset($_GET['deleteID'])) {
    $postID = $_GET['deleteID'];

    // Query to delete the post from the database
    $deleteQuery = "DELETE FROM galleryposts WHERE postID = ?";

    // Prepare the statement to prevent SQL injection
    if ($stmt = mysqli_prepare($conn, $deleteQuery)) {
        mysqli_stmt_bind_param($stmt, 'i', $postID); // 'i' means the variable is an integer
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to refresh the page after the post is deleted
            echo "<script>window.location.href = 'management.php';</script>";
            exit(); // Ensure no further code is executed after redirect
        } else {
            echo "Error deleting post.";
        }
        mysqli_stmt_close($stmt);
    }
}

// Check if a RECIPE needs to be approved or deleted
if (isset($_GET['approveRecipeID'])) {
    $recipeID = $_GET['approveRecipeID'];

    // Query to update the isApproved column to 'yes'
    $approveRecipeQuery = "UPDATE recipes SET isApproved = 'yes' WHERE recipeID = ?";

    // Prepare the statement to prevent SQL injection
    if ($stmt = mysqli_prepare($conn, $approveRecipeQuery)) {
        mysqli_stmt_bind_param($stmt, 'i', $recipeID); // 'i' means the variable is an integer
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to refresh the page and reflect the changes
            echo "<script>window.location.href = 'management.php';</script>";
            exit(); // Ensure that no further code is executed after redirect
        } else {
            echo "Error approving post.";
        }
        mysqli_stmt_close($stmt);
    }
}

// Check if a post needs to be deleted
if (isset($_GET['deleteRecipeID'])) {
    $recipeID = $_GET['deleteRecipeID'];

    // Query to delete the post from the database
    $deleteRecipeQuery = "DELETE FROM recipes WHERE recipeID = ?";

    // Prepare the statement to prevent SQL injection
    if ($stmt = mysqli_prepare($conn, $deleteRecipeQuery)) {
        mysqli_stmt_bind_param($stmt, 'i', $recipeID); // 'i' means the variable is an integer
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to refresh the page after the post is deleted
            echo "<script>window.location.href = 'management.php';</script>";
            exit();// Ensure no further code is executed after redirect
        } else {
            echo "Error deleting post.";
        }
        mysqli_stmt_close($stmt);
    }
}

// GALLERY || POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['postID']) && isset($_POST['primaryCategoryID'])) {
    // Get the values from the form
    $postID = $_POST['postID'];
    $primaryCategoryID = $_POST['primaryCategoryID'];

    // Prepare the update query
    $primaryPostQuery = "UPDATE galleryposts SET primaryCategoryID = ? WHERE postID = ?";

    // Prepare and execute the query to prevent SQL injection
    if ($stmt = mysqli_prepare($conn, $primaryPostQuery)) {
        mysqli_stmt_bind_param($stmt, 'ii', $primaryCategoryID, $postID); // Bind parameters for the query

        if (mysqli_stmt_execute($stmt)) {
            // Redirect back to the page after successful update
            echo "<script>window.location.href = 'management.php';</script>";
            exit(); // Ensure that no further code is executed after the redirect
        } else {
            echo "Error updating category.";
        }
        mysqli_stmt_close($stmt);
    }

    // Close the database connection
    mysqli_close($conn);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['postID']) && isset($_POST['subcategoryID'])) {
    // Get the values from the form
    $postID = $_POST['postID'];
    $subcategoryID = $_POST['subcategoryID'];

    // Prepare the update query
    $subPostQuery = "UPDATE galleryposts SET subcategoryID = ? WHERE postID = ?";

    // Prepare and execute the query to prevent SQL injection
    if ($stmt = mysqli_prepare($conn, $subPostQuery)) {
        mysqli_stmt_bind_param($stmt, 'ii', $subcategoryID, $postID); // Bind parameters for the query

        if (mysqli_stmt_execute($stmt)) {
            // Redirect back to the page after successful update
            echo "<script>window.location.href = 'management.php';</script>";
            exit(); // Ensure that no further code is executed after the redirect
        } else {
            echo "Error updating category.";
        }
        mysqli_stmt_close($stmt);
    }

    // Close the database connection
    mysqli_close($conn);
}

// RECIPE || RECIPES
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['recipeID']) && isset($_POST['primaryCategoryID'])) {
    $recipeID = $_POST['recipeID'];
    $primaryCategoryID = $_POST['primaryCategoryID'];

    // Prepare the query to update the primary category
    $primaryRecipeQuery = "UPDATE recipes SET primaryCategoryID = ? WHERE recipeID = ?";
    if ($stmt = mysqli_prepare($conn, $primaryRecipeQuery)) {
        mysqli_stmt_bind_param($stmt, 'ii', $primaryCategoryID, $recipeID);
        if (mysqli_stmt_execute($stmt)) {
            // Redirect after successful update
            echo "<script>window.location.href = 'management.php';</script>";
            exit();
        } else {
            echo "Error updating primary category.";
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}

// Handle Subcategory Update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['recipeID']) && isset($_POST['subcategoryID'])) {
    $recipeID = $_POST['recipeID'];
    $subcategoryID = $_POST['subcategoryID'];  // Fix here: get the subcategory ID from the POST data

    // Prepare the query to update the subcategory
    $subRecipeQuery = "UPDATE recipes SET subcategoryID = ? WHERE recipeID = ?";
    if ($stmt = mysqli_prepare($conn, $subRecipeQuery)) {
        mysqli_stmt_bind_param($stmt, 'ii', $subcategoryID, $recipeID);
        if (mysqli_stmt_execute($stmt)) {
            // Redirect after successful update
            echo "<script>window.location.href = 'management.php';</script>";
            exit();
        } else {
            echo "Error updating subcategory.";
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}

?>

<!-- MODERATION GALLERY -->
<div class="container-fluid">
    <h2 class="moderation">Moderation Content</h2>
    <div class="row text-center my-5">
        <div class="col">
            <div>
                <h3 class="badge">Gallery Post</h3>
            </div>
            <table class="table table-striped moderationGallery">
                <thead>
                    <tr>
                        <th scope="col">Full Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Label</th>
                        <th scope="col">Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($moderationGalleryResult) > 0) {
                        while ($moderationGalleryRow = mysqli_fetch_assoc($moderationGalleryResult)) {
                            ?>
                            <tr>
                                <td style="background-color:pink">
                                    <?php echo $moderationGalleryRow["firstName"] . " " . $moderationGalleryRow['lastName'] ?>
                                </td>
                                <td style="background-color:pink">
                                    <!-- Button to trigger the modal -->
                                    <button type="button" class="btn gallery-image-btn" data-bs-toggle="modal"
                                        data-bs-target="#imageModal<?php echo $moderationGalleryRow['postID']; ?>">
                                        View
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="imageModal<?php echo $moderationGalleryRow['postID']; ?>"
                                        tabindex="-1"
                                        aria-labelledby="imageModalLabel<?php echo $moderationGalleryRow['postID']; ?>"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="<?php echo !empty($moderationGalleryRow['imageURL']) ? htmlspecialchars($moderationGalleryRow['imageURL']) : 'default-placeholder.jpg'; ?>"
                                                        class="img-fluid rounded">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td style="background-color:pink">
                                    <?php echo $moderationGalleryRow["caption"] ? $moderationGalleryRow["caption"] : 'NULL' ?>
                                </td>
                                <td style="background-color:pink">
                                    <?php echo $moderationGalleryRow["primaryCategoryName"] . ", " . $moderationGalleryRow['subcategoryName'] ?>
                                </td>
                                <td style="background-color:pink">
                                    <!-- Approve button with link to trigger approval -->
                                    <a href="management.php?approveID=<?php echo $moderationGalleryRow['postID']; ?>"
                                        class="btn label">Approve</a>

                                    <!-- Delete button with link to trigger deletion -->
                                    <a href="management.php?deleteID=<?php echo $moderationGalleryRow['postID']; ?>"
                                        class="btn label"
                                        onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- MODERATION RECIPE -->
<div class="container-fluid">
    <h2 class="moderation">Moderation Content</h2>
    <div class="row text-center my-5">
        <div class="col">
            <div>
                <h3 class="badge">Recipe Post</h3>
            </div>
            <table class="table table-striped moderationRecipe">
                <thead>
                    <tr>
                        <th scope="col">Recipe ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Label</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($moderationRecipeResult) > 0) {
                        while ($moderationRecipeRow = mysqli_fetch_assoc($moderationRecipeResult)) {
                            ?>
                            <tr>
                                <td style="background-color:pink">
                                    <?php echo $moderationRecipeRow["recipeID"] ? $moderationRecipeRow["recipeID"] : 'NULL' ?>
                                </td>
                                <td style="background-color:pink">
                                    <?php echo $moderationRecipeRow["firstName"] . " " . $moderationRecipeRow['lastName'] ?>
                                </td>
                                <td style="background-color:pink">
                                    <!-- Button to trigger the modal -->
                                    <button type="button" class="btn recipe-image-btn" data-bs-toggle="modal"
                                        data-bs-target="#recipeImageModal<?php echo $moderationRecipeRow['recipeID']; ?>">
                                        View
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="recipeImageModal<?php echo $moderationRecipeRow['recipeID']; ?>"
                                        tabindex="-1"
                                        aria-labelledby="recipeImageModalLabel<?php echo $moderationRecipeRow['recipeID']; ?>"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="<?php echo !empty($moderationRecipeRow['imageURL']) ? htmlspecialchars($moderationRecipeRow['imageURL']) : 'default-placeholder.jpg'; ?>"
                                                        class="img-fluid rounded" alt="Recipe Image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td style="background-color:pink">
                                    <?php echo $moderationRecipeRow["recipeTitle"] ? $moderationRecipeRow["recipeTitle"] : 'NULL' ?>
                                </td>
                                <td style="background-color:pink">
                                    <?php echo $moderationRecipeRow["primaryCategoryName"] . ", " . $moderationRecipeRow['subcategoryName'] ?>
                                </td>
                                <td style="background-color:pink">
                                    <?php echo $moderationRecipeRow["createdAt"] ? $moderationRecipeRow["createdAt"] : 'NULL' ?>
                                </td>
                                <td style="background-color:pink">
                                    <!-- Approve button with link to trigger approval -->
                                    <a href="management.php?approveRecipeID=<?php echo $moderationRecipeRow['recipeID']; ?>"
                                        class="btn label">Approve</a>

                                    <!-- Delete button with link to trigger deletion -->
                                    <a href="management.php?deleteRecipeID=<?php echo $moderationRecipeRow['recipeID']; ?>"
                                        class="btn label"
                                        onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- MANAGEMENT GALLERY -->
<div class="container-fluid">
    <h2 class="moderation">Management Content</h2>
    <div class="row text-center my-5">
        <div class="col">
            <div>
                <h3 class="badge">Gallery Post</h3>
            </div>
            <table class="table table-striped managementRecipe">
                <thead>
                    <tr>
                        <th scope="col">Post ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Primary Category</th>
                        <th scope="col">Sub Category</th>
                        <th scope="col">Edit Label</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($managementGalleryResult) > 0) {
                        while ($managementGalleryRow = mysqli_fetch_assoc($managementGalleryResult)) {
                            ?>
                            <tr>
                                <td style="background-color:pink">
                                    <?php echo $managementGalleryRow["postID"] ? $managementGalleryRow["postID"] : 'NULL' ?>
                                </td>
                                <td style="background-color:pink">
                                    <?php echo $managementGalleryRow["firstName"] . " " . $managementGalleryRow['lastName'] ?>
                                </td>
                                <td style="background-color:pink">
                                    <!-- Button to trigger the modal -->
                                    <button type="button" class="btn recipe-image-btn" data-bs-toggle="modal"
                                        data-bs-target="#recipeImageModal<?php echo $managementGalleryRow['postID']; ?>">
                                        View
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="recipeImageModal<?php echo $managementGalleryRow['postID']; ?>"
                                        tabindex="-1"
                                        aria-labelledby="recipeImageModalLabel<?php echo $managementGalleryRow['postID']; ?>"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="<?php echo !empty($managementGalleryRow['imageURL']) ? htmlspecialchars($managementGalleryRow['imageURL']) : 'default-placeholder.jpg'; ?>"
                                                        class="img-fluid rounded" alt="Recipe Image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td style="background-color:pink">
                                    <?php echo $managementGalleryRow["caption"] ? $managementGalleryRow["caption"] : 'NULL' ?>
                                </td>
                                <td style="background-color:pink">
                                    <?php echo $managementGalleryRow["primaryCategoryName"] ? $managementGalleryRow["primaryCategoryName"] : 'NULL' ?>
                                </td>
                                <td style="background-color:pink">
                                    <?php echo $managementGalleryRow["subcategoryName"] ? $managementGalleryRow["subcategoryName"] : 'NULL' ?>
                                </td>
                                <td style="background-color:pink">
                                    <!-- Form to update the primary category for Gallery -->
                                    <form action="management.php" method="POST">
                                        <input type="hidden" name="postID"
                                            value="<?php echo $managementGalleryRow['postID']; ?>">
                                        <button class="btn action dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Prim Category
                                        </button>
                                        <ul class="dropdown-menu gallery">
                                            <li><a class="dropdown-item gallery" data-category-gallery="1"
                                                    data-target-gallery="primaryCategory">Breakfast</a></li>
                                            <li><a class="dropdown-item gallery" data-category-gallery="2"
                                                    data-target-gallery="primaryCategory">Lunch</a></li>
                                            <li><a class="dropdown-item gallery" data-category-gallery="3"
                                                    data-target-gallery="primaryCategory">Dinner</a></li>
                                            <li><a class="dropdown-item gallery" data-category-gallery="4"
                                                    data-target-gallery="primaryCategory">Dessert</a></li>
                                            <li><a class="dropdown-item gallery" data-category-gallery="5"
                                                    data-target-gallery="primaryCategory">Snack</a></li>
                                        </ul>
                                        <input type="hidden" name="primaryCategoryID" class="primaryCategory"
                                            value="<?php echo $managementGalleryRow['primaryCategoryID']; ?>">
                                        <button type="submit" class="btn action">Update Category</button>
                                    </form>

                                    <!-- Form to update the sub-category for Gallery -->
                                    <form action="management.php" method="POST">
                                        <input type="hidden" name="postID"
                                            value="<?php echo $managementGalleryRow['postID']; ?>">
                                        <button class="btn action dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Sub Category
                                        </button>
                                        <ul class="dropdown-menu gallery">
                                            <li><a class="dropdown-item gallery" data-category-gallery="1"
                                                    data-target-gallery="subcategory">Vegan</a></li>
                                            <li><a class="dropdown-item gallery" data-category-gallery="2"
                                                    data-target-gallery="subcategory">Pork</a></li>
                                            <li><a class="dropdown-item gallery" data-category-gallery="3"
                                                    data-target-gallery="subcategory">Chicken</a></li>
                                            <li><a class="dropdown-item gallery" data-category-gallery="4"
                                                    data-target-gallery="subcategory">Beef</a></li>
                                            <li><a class="dropdown-item gallery" data-category-gallery="5"
                                                    data-target-gallery="subcategory">Seafood</a></li>
                                            <li><a class="dropdown-item gallery" data-category-gallery="6"
                                                    data-target-gallery="subcategory">Others</a></li>
                                            <li><a class="dropdown-item gallery" data-category-gallery="7"
                                                    data-target-gallery="subcategory">None</a></li>
                                        </ul>
                                        <input type="hidden" name="subcategoryID" class="subcategory"
                                            value="<?php echo $managementGalleryRow['subcategoryID']; ?>">
                                        <button type="submit" class="btn action">Update Category</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- MANAGEMENT RECIPE -->
<div class="container-fluid">
    <h2 class="moderation">Management Content</h2>
    <div class="row text-center my-5">
        <div class="col">
            <div>
                <h3 class="badge">Recipe Post</h3>
            </div>
            <table class="table table-striped managementRecipe">
                <thead>
                    <tr>
                        <th scope="col">Recipe ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Primary Category</th>
                        <th scope="col">Sub Category</th>
                        <th scope="col">Edit Label</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($managementRecipeResult) > 0) {
                        while ($managementRecipeRow = mysqli_fetch_assoc($managementRecipeResult)) {
                            ?>
                            <tr>
                                <td style="background-color:pink">
                                    <?php echo $managementRecipeRow["recipeID"] ? $managementRecipeRow["recipeID"] : 'NULL' ?>
                                </td>
                                <td style="background-color:pink">
                                    <?php echo $managementRecipeRow["firstName"] . " " . $managementRecipeRow['lastName'] ?>
                                </td>
                                <td style="background-color:pink">
                                    <!-- Button to trigger the modal -->
                                    <button type="button" class="btn recipe-image-btn" data-bs-toggle="modal"
                                        data-bs-target="#recipeImageModal<?php echo $managementRecipeRow['recipeID']; ?>">
                                        View
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="recipeImageModal<?php echo $managementRecipeRow['recipeID']; ?>"
                                        tabindex="-1"
                                        aria-labelledby="recipeImageModalLabel<?php echo $managementRecipeRow['recipeID']; ?>"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="<?php echo !empty($managementRecipeRow['imageURL']) ? htmlspecialchars($managementRecipeRow['imageURL']) : 'default-placeholder.jpg'; ?>"
                                                        class="img-fluid rounded" alt="Recipe Image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td style="background-color:pink">
                                    <?php echo $managementRecipeRow["recipeTitle"] ? $managementRecipeRow["recipeTitle"] : 'NULL' ?>
                                </td>
                                <td style="background-color:pink">
                                    <?php echo $managementRecipeRow["primaryCategoryName"] ? $managementRecipeRow["primaryCategoryName"] : 'NULL' ?>
                                </td>
                                <td style="background-color:pink">
                                    <?php echo $managementRecipeRow["subcategoryName"] ? $managementRecipeRow["subcategoryName"] : 'NULL' ?>
                                </td>
                                <td style="background-color:pink">
                                    <!-- Form to update the primary category -->
                                    <form action="management.php" method="POST">
                                        <input type="hidden" name="recipeID"
                                            value="<?php echo $managementRecipeRow['recipeID']; ?>">
                                        <!-- Primary Category Dropdown -->
                                        <button class="btn action dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Prim Category
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" data-category="1"
                                                    data-target="#primaryCategoryID<?php echo $managementRecipeRow['recipeID']; ?>">Breakfast</a>
                                            </li>
                                            <li><a class="dropdown-item" data-category="2"
                                                    data-target="#primaryCategoryID<?php echo $managementRecipeRow['recipeID']; ?>">Lunch</a>
                                            </li>
                                            <li><a class="dropdown-item" data-category="3"
                                                    data-target="#primaryCategoryID<?php echo $managementRecipeRow['recipeID']; ?>">Dinner</a>
                                            </li>
                                            <li><a class="dropdown-item" data-category="4"
                                                    data-target="#primaryCategoryID<?php echo $managementRecipeRow['recipeID']; ?>">Dessert</a>
                                            </li>
                                            <li><a class="dropdown-item" data-category="5"
                                                    data-target="#primaryCategoryID<?php echo $managementRecipeRow['recipeID']; ?>">Snack</a>
                                            </li>
                                        </ul>
                                        <input type="hidden" name="primaryCategoryID"
                                            id="primaryCategoryID<?php echo $managementRecipeRow['recipeID']; ?>"
                                            value="<?php echo $managementRecipeRow['primaryCategoryID']; ?>">
                                        <button type="submit" class="btn action">Update Category</button>
                                    </form>

                                    <!-- Form to update the sub-category -->
                                    <form action="management.php" method="POST">
                                        <input type="hidden" name="recipeID"
                                            value="<?php echo $managementRecipeRow['recipeID']; ?>">
                                        <!-- Sub Category Dropdown -->
                                        <button class="btn action dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Sub Category
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" data-category="1"
                                                    data-target="#subcategoryID<?php echo $managementRecipeRow['recipeID']; ?>">Vegan</a>
                                            </li>
                                            <li><a class="dropdown-item" data-category="2"
                                                    data-target="#subcategoryID<?php echo $managementRecipeRow['recipeID']; ?>">Pork</a>
                                            </li>
                                            <li><a class="dropdown-item" data-category="3"
                                                    data-target="#subcategoryID<?php echo $managementRecipeRow['recipeID']; ?>">Chicken</a>
                                            </li>
                                            <li><a class="dropdown-item" data-category="4"
                                                    data-target="#subcategoryID<?php echo $managementRecipeRow['recipeID']; ?>">Beef</a>
                                            </li>
                                            <li><a class="dropdown-item" data-category="5"
                                                    data-target="#subcategoryID<?php echo $managementRecipeRow['recipeID']; ?>">Seafood</a>
                                            </li>
                                            <li><a class="dropdown-item" data-category="6"
                                                    data-target="#subcategoryID<?php echo $managementRecipeRow['recipeID']; ?>">Others</a>
                                            </li>
                                            <li><a class="dropdown-item" data-category="7"
                                                    data-target="#subcategoryID<?php echo $managementRecipeRow['recipeID']; ?>">None</a>
                                            </li>
                                        </ul>
                                        <input type="hidden" name="subcategoryID"
                                            id="subcategoryID<?php echo $managementRecipeRow['recipeID']; ?>"
                                            value="<?php echo $managementRecipeRow['subcategoryID']; ?>">
                                        <button type="submit" class="btn action">Update Category</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // JavaScript for Primary Category (Gallery and Recipe)
    document.querySelectorAll('.dropdown-menu .dropdown-item').forEach(item => {
        item.addEventListener('click', function () {
            const categoryID = this.getAttribute('data-category'); // Get category ID from clicked item
            const targetID = this.getAttribute('data-target'); // Get the target ID for the hidden input
            const targetInput = document.querySelector(targetID); // Find the hidden input using its unique ID
            if (targetInput) {
                targetInput.value = categoryID; // Update the hidden input value
            }
        });
    });

    document.querySelectorAll('.dropdown-menu.gallery .dropdown-item.gallery').forEach(item => {
        item.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent default behavior

            const categoryID = this.getAttribute('data-category-gallery'); // Get category ID
            const targetClass = this.getAttribute('data-target-gallery'); // Get target class
            const form = this.closest('form'); // Find the parent form

            // Find the hidden input within the same form
            const targetInput = form.querySelector(`.${targetClass}`);
            if (targetInput) {
                targetInput.value = categoryID; // Update the hidden input value
                console.log(`Updated input of class ${targetClass} with value ${categoryID}`);
            } else {
                console.error(`Input with class ${targetClass} not found in form.`);
            }
        });
    });
</script>