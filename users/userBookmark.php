<?php
include("../connect.php");

// INDIVIDUAL LIST OF BOOKMARKS PER USER
// Query for User Bookmarked Records (RECIPES)
// Change the bookmarks.userID = 7 value using SESSION

$queryUserBookmarksRcIndividual = "
SELECT bookmarks.*, users.userID AS userBookmarkerID, users.firstName, users.lastName, recipes.*
FROM bookmarks
LEFT JOIN users ON users.userID = bookmarks.userID 
LEFT JOIN recipes ON recipes.recipeID = bookmarks.recipeID
WHERE bookmarks.recipeID >= 1 AND bookmarks.userID = 7;
";

$resultUserBookmarksRcIndividual = executeQuery($queryUserBookmarksRcIndividual);

// Query for User Bookmarked Records (GALLERY POSTS)
// Change the bookmarks.userID = 7 value using SESSION

$queryUserBookmarksGpIndividual = "
SELECT bookmarks.*, users.userID AS userBookmarkerID, users.firstName, users.lastName, galleryposts.*
FROM bookmarks
LEFT JOIN users ON users.userID = bookmarks.userID 
LEFT JOIN galleryposts ON galleryposts.postID = bookmarks.postID
WHERE bookmarks.postID >= 1 AND bookmarks.userID = 7;
";

$resultUserBookmarksGpIndividual = executeQuery($queryUserBookmarksGpIndividual);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - TasteBuds</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../shared/assets/css/activityLog.css">
</head>

<body>
    <div class="profile-page">
        <header class="profile-header">
            <img src="../shared/assets/image/Logo.png" alt="TasteBuds Logo">
            <h1>User Profile</h1>
        </header>
        <main>
            <!-- Bookmarked Content Section -->
            <section class="content-section">
                <h2>Bookmarked Content</h2>
                <div class="content-container">

                    <div class="category">
                        <h3>Recipes</h3>
                        <?php
                        if (mysqli_num_rows($resultUserBookmarksRcIndividual) > 0) {
                            while ($userBookmarksRcIndividualRow = mysqli_fetch_assoc($resultUserBookmarksRcIndividual)) {
                                ?>
                                <div class="item-list mb-3" id="bookmarked-recipes">
                                    <a href="recipeOverview.php?recipeID=<?php echo $userBookmarksRcIndividualRow['recipeID']; ?>"
                                        class="item">
                                        <span
                                            style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: inline-block; max-width: 80%;">
                                            <?php echo "<i>" . $userBookmarksRcIndividualRow['bookmarkedAt'] . "</i> | " . $userBookmarksRcIndividualRow['recipeTitle']; ?>
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
                        if (mysqli_num_rows($resultUserBookmarksGpIndividual) > 0) {
                            while ($userBookmarksGpIndividualRow = mysqli_fetch_assoc($resultUserBookmarksGpIndividual)) {
                                ?>
                                <div class="item-list mb-3" id="bookmarked-gallery">
                                    <!-- Change the href "postOverview" to Gallery Post View with postID -->
                                    <a href="postOverview.php?postID=<?php echo $userBookmarksGpIndividualRow['postID']; ?>"
                                        class="item">
                                        <span
                                            style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: inline-block; max-width: 80%;">
                                            <?php echo "<i>" . $userBookmarksGpIndividualRow['bookmarkedAt'] . "</i> | " . $userBookmarksGpIndividualRow['caption']; ?>
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