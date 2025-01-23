<?php
include("connect.php");

// INDIVIDUAL LIST OF LIKES PER USER
// USER - Query for User Liked Records (RECIPES)
// Change the likes.userID = 14 value using SESSION

$queryUserLikesRcIndividual = "
SELECT likes.*, users.userID AS userLikerID, users.firstName, users.lastName, recipes.*
FROM likes
LEFT JOIN users ON users.userID = likes.userID 
LEFT JOIN recipes ON recipes.recipeID = likes.recipeID
WHERE likes.recipeID >= 1 AND likes.userID = 14;
";

$resultUserLikesRcIndividual = executeQuery($queryUserLikesRcIndividual);

// USER - Query for User Liked Records (GALLERY POSTS)
// Change the likes.userID = 9 value using SESSION

$queryUserLikesGpIndividual = "
SELECT likes.*, users.userID AS userLikerID, users.firstName, users.lastName, galleryposts.*
FROM likes
LEFT JOIN users ON users.userID = likes.userID 
LEFT JOIN galleryposts ON galleryposts.postID = likes.postID
WHERE likes.postID >= 1 AND likes.userID = 9;
";

$resultUserLikesGpIndividual = executeQuery($queryUserLikesGpIndividual);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - TasteBuds</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="shared/assets/css/activityLog.css">
</head>

<body>
    <div class="profile-page">
        <header class="profile-header">
            <img src="shared/assets/image/Logo.png" alt="TasteBuds Logo">
            <h1>User Profile</h1>
        </header>
        <!-- Liked Content Section -->
        <section class="content-section">
            <h2>Liked Content</h2>
            <div class="content-container">

                <div class="category">
                    <h3>Recipes</h3>
                    <?php
                    if (mysqli_num_rows($resultUserLikesRcIndividual) > 0) {
                        while ($userLikesRowIndividualRc = mysqli_fetch_assoc($resultUserLikesRcIndividual)) {
                            ?>
                            <div class="item-list mb-3" id="liked-recipes">
                                <a href="recipeOverview.php?recipeID=<?php echo $userLikesRowIndividualRc['recipeID']; ?>"
                                    class="item">
                                    <span
                                        style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: inline-block; max-width: 80%;">
                                        <?php echo "<i>" . $userLikesRowIndividualRc['likedAt'] . "</i> | " . $userLikesRowIndividualRc['recipeTitle']; ?>
                                    </span>


                                </a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>

                <div class="category">
                    <h3>Gallery</h3>
                    <?php
                    if (mysqli_num_rows($resultUserLikesGpIndividual) > 0) {
                        while ($userLikesRowIndividualGp = mysqli_fetch_assoc($resultUserLikesGpIndividual)) {
                            ?>
                            <div class="item-list mb-3" id="liked-gallery">
                                <!-- Change the href "postOverview" to Gallery Post View with postID -->
                                <a href="postOverview.php?postID=<?php echo $userLikesRowIndividualGp['postID']; ?>"
                                    class="item">
                                    <span
                                        style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: inline-block; max-width: 80%;">
                                        <?php echo "<i>" . $userLikesRowIndividualGp['likedAt'] . "</i> | " . $userLikesRowIndividualGp['caption']; ?>
                                    </span>
                                </a>
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

</body>

</html>