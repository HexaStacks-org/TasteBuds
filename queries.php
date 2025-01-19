<!-- FILE UPDATED: 18-01-2025 1:11 PM-->


<?php
include("shared/components/connect.php");

// Queries for Recipe and Gallery Posts Details
$queryRecipes = "
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
";

$queryPosts = "
    SELECT galleryposts.*, 
           users.*, 
           images.*, 
           primaryfoodcategories.*,
           foodSubcategories.*, 
           (SELECT COUNT(likeID) FROM likes WHERE likes.postID = galleryposts.postID) AS likesCount,
          (SELECT COUNT(bookmarkID) FROM bookmarks WHERE bookmarks.postID = galleryposts.postID) AS bookmarksCount
    FROM galleryposts
    LEFT JOIN users ON users.userID = galleryposts.userID
    LEFT JOIN images ON images.postID = galleryposts.postID
    LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = galleryposts.primaryCategoryID
    LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = galleryposts.subcategoryID
";

$resultRecipes = executeQuery($queryRecipes);
$resultPosts = executeQuery($queryPosts);

// Query for Reports and Reasons Details
$queryReports = "SELECT * FROM reports 
LEFT JOIN reasons ON reasons.reasonID = reports.reasonID
LEFT JOIN users ON users.userID = reports.userID
";

$resultReports = executeQuery($queryReports);

// Query for Top 5 Recipes
$queryTopRecipes = "
SELECT recipes.*, 
           images.*, 
           primaryfoodcategories.*, 
           (SELECT COUNT(likeID) FROM likes WHERE likes.recipeID = recipes.recipeID) AS likesCount
FROM recipes
LEFT JOIN images ON images.recipeID = recipes.recipeID
LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = recipes.primaryCategoryID
ORDER BY likesCount DESC
LIMIT 5;
";

$resultTopRecipes = executeQuery($queryTopRecipes);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>16-1-25 Recipes and Gallery Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container my-5">

        <!-- Card View for Recipes-->
        <h1 class="text-center mb-4">RECIPES</h1>

        <div class="container">
            <div class="row">

                <?php
                if (mysqli_num_rows($resultRecipes) > 0) {
                    while ($recipesRow = mysqli_fetch_assoc($resultRecipes)) {
                        ?>
                        <div class="col">
                            <div class="card" style="width: 18rem; margin-bottom: 40px;">
                                <img src="<?= $recipesRow['imageURL'] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        #<?php echo $recipesRow['recipeID'] . ". " . $recipesRow['recipeTitle'] ?></h5>
                                    <p class="card-text"><?php echo $recipesRow['description'] ?></p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Ingredients: <?php echo $recipesRow['ingredients'] ?></li>
                                    <li class="list-group-item">Steps: <?php echo $recipesRow['steps'] ?></li>
                                    <li class="list-group-item">Posted By:
                                        <?php echo $recipesRow['firstName'] . " " . $recipesRow['lastName'] ?>
                                    </li>
                                    <li class="list-group-item">Is Approved? : <?php echo $recipesRow['isApproved'] ?></li>
                                    <li class="list-group-item">Created At: <?php echo $recipesRow['createdAt'] ?></li>
                                    <li class="list-group-item">Updated At:
                                        <?php echo $recipesRow['updatedAt'] ? $recipesRow['updatedAt'] : 'NULL'; ?>
                                    </li>

                                    <li class="list-group-item">Primary Category Name:
                                        <?php echo $recipesRow['primaryCategoryName'] ?></li>
                                    <li class="list-group-item">Subcategory Name: <?php echo $recipesRow['subcategoryName'] ?>
                                    </li>
                                    <li class="list-group-item list-group-item-primary">Likes Count:
                                        <?php echo $recipesRow['likesCount'] ?>
                                    </li>
                                    <li class="list-group-item list-group-item-success">Bookmarks Count:
                                        <?php echo $recipesRow['bookmarksCount'] ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>


        <!-- Card View for Gallery Posts-->
        <hr style="border: 2px solid #000; margin: 20px auto;">
        <h1 class="text-center mb-4">GALLERY POSTS</h1>

        <div class="container">
            <div class="row">

                <?php
                if (mysqli_num_rows($resultPosts) > 0) {
                    while ($postsRow = mysqli_fetch_assoc($resultPosts)) {
                        ?>
                        <div class="col">
                            <div class="card" style="width: 18rem; margin-bottom: 40px ;">
                                <img src="<?= $postsRow['imageURL'] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">#<?php echo $postsRow['postID'] ?></h5>
                                    <p class="card-text"><?php echo $postsRow['caption'] ?></p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Posted By:
                                        <?php echo $postsRow['firstName'] . " " . $postsRow['lastName'] ?>
                                    </li>
                                    <li class="list-group-item">Is Approved? : <?php echo $postsRow['isApproved'] ?></li>
                                    <li class="list-group-item">Created At: <?php echo $postsRow['createdAt'] ?></li>
                                    <li class="list-group-item">Updated At:
                                        <?php echo $postsRow['updatedAt'] ? $postsRow['updatedAt'] : 'NULL'; ?>
                                    </li>

                                    <li class="list-group-item">Primary Category Name:
                                        <?php echo $postsRow['primaryCategoryName'] ?></li>
                                    <li class="list-group-item">Subcategory Name: <?php echo $postsRow['subcategoryName'] ?>
                                    </li>
                                    <li class="list-group-item list-group-item-primary">Likes Count:
                                        <?php echo $postsRow['likesCount'] ?>
                                    </li>
                                    <li class="list-group-item list-group-item-success">Bookmarks Count:
                                        <?php echo $postsRow['bookmarksCount'] ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>

        <!--Reports and Reasons in List View -->
        <hr style="border: 2px solid #000; margin: 20px auto;">
        <h1 class="text-center mb-4">REPORTS and REASONS</h1>

        <div class="container">
            <div class="row">

                <?php
                if (mysqli_num_rows($resultReports) > 0) {
                    while ($reportsRow = mysqli_fetch_assoc($resultReports)) {
                        ?>
                        <div class="col" style="margin-bottom: 40px;">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-danger"><b>Report ID:</b>
                                    <?php echo $reportsRow['reportID'] ?>
                                </li>
                                <li class="list-group-item">Reported By:
                                    <?php echo $reportsRow['firstName'] . " " . $reportsRow['lastName'] ?>
                                </li>
                                <li class="list-group-item">Reported Recipe ID:
                                    <?php echo $reportsRow['recipeID'] ? $reportsRow['recipeID'] : 'NULL'; ?>
                                </li>
                                <li class="list-group-item">Reported Gallery Post ID:
                                    <?php echo $reportsRow['postID'] ? $reportsRow['postID'] : 'NULL'; ?>
                                </li>
                                <li class="list-group-item">Reason: <?php echo $reportsRow['reason'] ?></li>
                                <li class="list-group-item list-group-item-warning">Other Reason:
                                    <?php echo $reportsRow['otherReason'] ? $reportsRow['otherReason'] : 'NULL'; ?>
                                </li>
                                <li class="list-group-item">Reported At: <?php echo $reportsRow['reportedAt'] ?></li>
                                <li class="list-group-item">Status: <?php echo $reportsRow['status'] ?></li>
                            </ul>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>

        <!-- Card View for Top 5 Recipes -->
        <hr style="border: 2px solid #000; margin: 20px auto;">
        <h1 class="text-center mb-4">TOP 5 RECIPES</h1>

        <div class="container">
            <div class="row">

                <?php
                if (mysqli_num_rows($resultTopRecipes) > 0) {
                    while ($topRecipesRow = mysqli_fetch_assoc($resultTopRecipes)) {
                        ?>
                        <div class="col">
                            <div class="card" style="width: 18rem; margin-bottom: 40px;">
                                <img src="<?= $topRecipesRow['imageURL'] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        #<?php echo $topRecipesRow['recipeID'] . ". " . $topRecipesRow['recipeTitle'] ?>
                                    </h5>
                                    <p class="card-text">Primary Category Name:
                                        <?php echo $topRecipesRow['primaryCategoryName'] ?></p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item list-group-item-primary">Likes Count:
                                        <?php echo $topRecipesRow['likesCount'] ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>





    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>