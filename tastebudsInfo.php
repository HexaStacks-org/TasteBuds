

<?php
include("shared/components/connect.php");

// (SELECT) Query to fetch data
$queryBookmarks = "SELECT * FROM `bookmarks`";
$queryFoodSubcategories = "SELECT * FROM `foodsubcategories`";
$queryGalleryPosts = "SELECT * FROM `galleryposts`";
$queryImages = "SELECT * FROM `images`";
$queryLikes = "SELECT * FROM `likes`";
$queryPrimaryFoodCategories = "SELECT * FROM `primaryfoodcategories`";
$queryRecipes = "SELECT * FROM `recipes`";
$queryUsers = "SELECT * FROM `users`";
$queryReports = "SELECT * FROM `reports`";
$queryReasons = "SELECT * FROM `reasons`";

// Execute Queries
$resultBookmarks = executeQuery($queryBookmarks);
$resultFoodSubcategories = executeQuery($queryFoodSubcategories);
$resultGalleryPosts = executeQuery($queryGalleryPosts);
$resultImages = executeQuery($queryImages);
$resultLikes = executeQuery($queryLikes);
$resultPrimaryFoodCategories = executeQuery($queryPrimaryFoodCategories);
$resultRecipes = executeQuery($queryRecipes);
$resultUsers = executeQuery($queryUsers);
$resultReports = executeQuery($queryReports);
$resultReasons = executeQuery($queryReasons);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>12-1-25 Overview of Database Results</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .card {
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <div class="container my-5">

        <!-- USERS table -->
        <h1 class="text-center mb-4">USERS</h1>
        <hr style="border: 2px solid #000; margin: 20px auto;">

        <div class="row mt-1 mb-1">
            <div class="col">
                <div class="card p-4 rounded-5 mx-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead style="font-family: 'Montserrat', sans-serif;">
                                <tr>
                                    <th scope="col">userID</th>
                                    <th scope="col">firstName</th>
                                    <th scope="col">lastName</th>
                                    <th scope="col">email</th>
                                    <th scope="col">password</th>
                                    <th scope="col">role</th>
                                    <th scope="col">registeredAt</th>
                                    <th scope="col">isRestricted</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                if (mysqli_num_rows($resultUsers) > 0) {
                                    while ($resultUsersRow = mysqli_fetch_assoc($resultUsers)) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $resultUsersRow['userID'] ?></th>
                                            <td><?php echo $resultUsersRow['firstName'] ?></td>
                                            <td><?php echo $resultUsersRow['lastName'] ?></td>
                                            <td><?php echo $resultUsersRow['email'] ?></td>
                                            <td><?php echo $resultUsersRow['password'] ?></td>
                                            <td><?php echo $resultUsersRow['role'] ?></td>
                                            <td><?php echo $resultUsersRow['registeredAt'] ?></td>
                                            <td><?php echo $resultUsersRow['isRestricted'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- RECIPES table -->
        <h1 class="text-center mb-4">RECIPES</h1>
        <hr style="border: 2px solid #000; margin: 20px auto;">

        <div class="row mt-1 mb-1">
            <div class="col">
                <div class="card p-4 rounded-5 mx-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead style="font-family: 'Montserrat', sans-serif;">
                                <tr>
                                    <th scope="col">recipeID</th>
                                    <th scope="col">recipeTitle</th>
                                    <th scope="col">description</th>
                                    <th scope="col">ingredients</th>
                                    <th scope="col">steps</th>
                                    <th scope="col">userID</th>
                                    <th scope="col">isApproved</th>
                                    <th scope="col">createdAt</th>
                                    <th scope="col">updatedAt</th>
                                    <th scope="col">primaryCategoryID</th>
                                    <th scope="col">subcategoryID</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                if (mysqli_num_rows($resultRecipes) > 0) {
                                    while ($resultRecipesRow = mysqli_fetch_assoc($resultRecipes)) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $resultRecipesRow['recipeID'] ?></th>
                                            <td><?php echo $resultRecipesRow['recipeTitle'] ?></td>
                                            <td><?php echo $resultRecipesRow['description'] ?></td>
                                            <td><?php echo $resultRecipesRow['ingredients'] ?></td>
                                            <td><?php echo $resultRecipesRow['steps'] ?></td>
                                            <td><?php echo $resultRecipesRow['userID'] ?></td>
                                            <td><?php echo $resultRecipesRow['isApproved'] ?></td>
                                            <td><?php echo $resultRecipesRow['createdAt'] ?></td>
                                            <td><?php echo $resultRecipesRow['updatedAt'] ? $resultRecipesRow['updatedAt'] : 'NULL'; ?>
                                            </td>
                                            <td><?php echo $resultRecipesRow['primaryCategoryID'] ?></td>
                                            <td><?php echo $resultRecipesRow['subcategoryID'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- GALLERY POSTS table -->
        <h1 class="text-center mb-4">GALLERY POSTS</h1>
        <hr style="border: 2px solid #000; margin: 20px auto;">

        <div class="row mt-1 mb-1">
            <div class="col">
                <div class="card p-4 rounded-5 mx-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead style="font-family: 'Montserrat', sans-serif;">
                                <tr>
                                    <th scope="col">postID</th>
                                    <th scope="col">caption</th>
                                    <th scope="col">userID</th>
                                    <th scope="col">isApproved</th>
                                    <th scope="col">createdAt</th>
                                    <th scope="col">updatedAt</th>
                                    <th scope="col">primaryCategoryID</th>
                                    <th scope="col">subcategoryID</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                if (mysqli_num_rows($resultGalleryPosts) > 0) {
                                    while ($resultGalleryPostsRow = mysqli_fetch_assoc($resultGalleryPosts)) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $resultGalleryPostsRow['postID'] ?></th>
                                            <td><?php echo $resultGalleryPostsRow['caption'] ?></td>
                                            <td><?php echo $resultGalleryPostsRow['userID'] ?></td>
                                            <td><?php echo $resultGalleryPostsRow['isApproved'] ?></td>
                                            <td><?php echo $resultGalleryPostsRow['createdAt'] ?></td>
                                            <td><?php echo $resultGalleryPostsRow['updatedAt'] ? $resultGalleryPostsRow['updatedAt'] : 'NULL'; ?>
                                            </td>

                                            <td><?php echo $resultGalleryPostsRow['primaryCategoryID'] ?></td>
                                            <td><?php echo $resultGalleryPostsRow['subcategoryID'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- LIKES table -->
        <h1 class="text-center mb-4">LIKES</h1>
        <hr style="border: 2px solid #000; margin: 20px auto;">

        <div class="row mt-1 mb-1">
            <div class="col">
                <div class="card p-4 rounded-5 mx-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead style="font-family: 'Montserrat', sans-serif;">
                                <tr>
                                    <th scope="col">likeID</th>
                                    <th scope="col">userID</th>
                                    <th scope="col">recipeID</th>
                                    <th scope="col">postID</th>
                                    <th scope="col">likedAt</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                if (mysqli_num_rows($resultLikes) > 0) {
                                    while ($resultLikesRow = mysqli_fetch_assoc($resultLikes)) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $resultLikesRow['likeID'] ?></th>
                                            <td><?php echo $resultLikesRow['userID'] ?></td>
                                            <td><?php echo $resultLikesRow['recipeID'] ?></td>
                                            <td><?php echo $resultLikesRow['postID'] ?></td>
                                            <td><?php echo $resultLikesRow['likedAt'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- BOOKMARKS table -->
        <h1 class="text-center mb-4">BOOKMARKS</h1>
        <hr style="border: 2px solid #000; margin: 20px auto;">

        <div class="row mt-1 mb-1">
            <div class="col">
                <div class="card p-4 rounded-5 mx-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead style="font-family: 'Montserrat', sans-serif;">
                                <tr>
                                    <th scope="col">bookmarkID</th>
                                    <th scope="col">userID</th>
                                    <th scope="col">recipeID</th>
                                    <th scope="col">postID</th>
                                    <th scope="col">bookmarkedAt</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                if (mysqli_num_rows($resultBookmarks) > 0) {
                                    while ($resultBookmarksRow = mysqli_fetch_assoc($resultBookmarks)) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $resultBookmarksRow['bookmarkID'] ?></th>
                                            <td><?php echo $resultBookmarksRow['userID'] ?></td>
                                            <td><?php echo $resultBookmarksRow['recipeID'] ?></td>
                                            <td><?php echo $resultBookmarksRow['postID'] ?></td>
                                            <td><?php echo $resultBookmarksRow['bookmarkedAt'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- IMAGES table -->
        <h1 class="text-center mb-4">IMAGES</h1>
        <hr style="border: 2px solid #000; margin: 20px auto;">

        <div class="row mt-1 mb-1">
            <div class="col">
                <div class="card p-4 rounded-5 mx-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead style="font-family: 'Montserrat', sans-serif;">
                                <tr>
                                    <th scope="col">imageID</th>
                                    <th scope="col">imageURL</th>
                                    <th scope="col">recipeID</th>
                                    <th scope="col">postID</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                if (mysqli_num_rows($resultImages) > 0) {
                                    while ($resultImagesRow = mysqli_fetch_assoc($resultImages)) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $resultImagesRow['imageID'] ?></th>
                                            <td><?php echo $resultImagesRow['imageURL'] ?></td>
                                            <td><?php echo $resultImagesRow['recipeID'] ?></td>
                                            <td><?php echo $resultImagesRow['postID'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- REPORTS table -->
        <h1 class="text-center mb-4">REPORTS</h1>
        <hr style="border: 2px solid #000; margin: 20px auto;">

        <div class="row mt-1 mb-1">
            <div class="col">
                <div class="card p-4 rounded-5 mx-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead style="font-family: 'Montserrat', sans-serif;">
                                <tr>
                                    <th scope="col">reportID</th>
                                    <th scope="col">userID</th>
                                    <th scope="col">recipeID</th>
                                    <th scope="col">postID</th>
                                    <th scope="col">reasonID</th>
                                    <th scope="col">otherReason</th>
                                    <th scope="col">reportedAt</th>
                                    <th scope="col">status</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                if (mysqli_num_rows($resultReports) > 0) {
                                    while ($resultReportsRow = mysqli_fetch_assoc($resultReports)) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $resultReportsRow['reportID'] ?></th>
                                            <td><?php echo $resultReportsRow['userID'] ?></td>
                                            <td><?php echo $resultReportsRow['recipeID'] ?></td>
                                            <td><?php echo $resultReportsRow['postID'] ?></td>
                                            <td><?php echo $resultReportsRow['reasonID'] ?></td>
                                            <td><?php echo $resultReportsRow['otherReason'] ?></td>
                                            <td><?php echo $resultReportsRow['reportedAt'] ?></td>
                                            <td><?php echo $resultReportsRow['status'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- REASONS table -->
        <h1 class="text-center mb-4">REASONS</h1>
        <hr style="border: 2px solid #000; margin: 20px auto;">

        <div class="row mt-1 mb-1">
            <div class="col">
                <div class="card p-4 rounded-5 mx-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead style="font-family: 'Montserrat', sans-serif;">
                                <tr>
                                    <th scope="col">reasonID</th>
                                    <th scope="col">reason</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                if (mysqli_num_rows($resultReasons) > 0) {
                                    while ($resultReasonsRow = mysqli_fetch_assoc($resultReasons)) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $resultReasonsRow['reasonID'] ?></th>
                                            <td><?php echo $resultReasonsRow['reason'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- PRIMARY FOOD CATEGORIES table -->
        <h1 class="text-center mb-4">PRIMARY FOOD CATEGORIES</h1>
        <hr style="border: 2px solid #000; margin: 20px auto;">

        <div class="row mt-1 mb-1">
            <div class="col">
                <div class="card p-4 rounded-5 mx-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead style="font-family: 'Montserrat', sans-serif;">
                                <tr>
                                    <th scope="col">primaryCategoryID</th>
                                    <th scope="col">primaryCategoryName</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                if (mysqli_num_rows($resultPrimaryFoodCategories) > 0) {
                                    while ($resultPrimaryFoodCategoriesRow = mysqli_fetch_assoc($resultPrimaryFoodCategories)) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $resultPrimaryFoodCategoriesRow['primaryCategoryID'] ?>
                                            </th>
                                            <td><?php echo $resultPrimaryFoodCategoriesRow['primaryCategoryName'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- FOOD SUBCATEGORIES table -->
        <h1 class="text-center mb-4">FOOD SUBCATEGORIES</h1>
        <hr style="border: 2px solid #000; margin: 20px auto;">

        <div class="row mt-1 mb-1">
            <div class="col">
                <div class="card p-4 rounded-5 mx-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead style="font-family: 'Montserrat', sans-serif;">
                                <tr>
                                    <th scope="col">subcategoryID</th>
                                    <th scope="col">subcategoryName</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                if (mysqli_num_rows($resultFoodSubcategories) > 0) {
                                    while ($resultFoodSubcategoriesRow = mysqli_fetch_assoc($resultFoodSubcategories)) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $resultFoodSubcategoriesRow['subcategoryID'] ?></th>
                                            <td><?php echo $resultFoodSubcategoriesRow['subcategoryName'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>