<?php
include("../connect.php");
session_start();

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];

    // SQL query to get user information (first name, last name)
    $queryUserIndividual = "
    SELECT firstName, lastName 
    FROM users 
    WHERE userID = $userID;
    ";

    $resultUserIndividual = executeQuery($queryUserIndividual);
    $user = mysqli_fetch_assoc($resultUserIndividual);

    // INDIVIDUAL LIST OF BOOKMARKS PER USER
    // Query for User Bookmarked Records (RECIPES)
    $queryUserBookmarksRcIndividual = "
    SELECT bookmarks.*, users.userID AS userBookmarkerID, recipes.*
    FROM bookmarks
    LEFT JOIN users ON users.userID = bookmarks.userID 
    LEFT JOIN recipes ON recipes.recipeID = bookmarks.recipeID
    WHERE bookmarks.recipeID >= 1 AND bookmarks.userID = $userID;
    ";

    $resultUserBookmarksRcIndividual = executeQuery($queryUserBookmarksRcIndividual);

    // Query for User Bookmarked Records (GALLERY POSTS)
    $queryUserBookmarksGpIndividual = "
    SELECT bookmarks.*, users.userID AS userBookmarkerID, galleryposts.*
    FROM bookmarks
    LEFT JOIN users ON users.userID = bookmarks.userID 
    LEFT JOIN galleryposts ON galleryposts.postID = bookmarks.postID
    WHERE bookmarks.postID >= 1 AND bookmarks.userID = $userID;
    ";

    $resultUserBookmarksGpIndividual = executeQuery($queryUserBookmarksGpIndividual);
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
    <link rel="icon" type="image" href="../shared/assets/image/TasteBuds_Icon.png">
</head>

<body>
    <?php include("../shared/components/navbar.php") ?>

    <div class="profile-page">
        <header class="profile-header">
            <img src="../shared/assets/image/userLogo.png" alt="TasteBuds Logo">
            <h1>
                <?php
                if ($user) {
                    echo htmlspecialchars(strtoupper($user['firstName']) . ' ' . strtoupper($user['lastName']));
                } else {
                    echo "User Profile";
                }
                ?>
            </h1>

        </header>

        <main>
            <!-- Bookmarked Content Section -->
            <section class="content-section">
                <h2>Bookmarked Content</h2>
                <div class="content-container">

                    <div class="category">
                        <h3>Recipes</h3>
                        <?php
                        if (isset($resultUserBookmarksRcIndividual) && mysqli_num_rows($resultUserBookmarksRcIndividual) > 0) {
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
                        } else {
                            echo "<p>No bookmarked recipes found.</p>";
                        }
                        ?>
                    </div>

                    <div class="category">
                        <h3>Gallery</h3>
                        <?php
                        if (isset($resultUserBookmarksGpIndividual) && mysqli_num_rows($resultUserBookmarksGpIndividual) > 0) {
                            while ($userBookmarksGpIndividualRow = mysqli_fetch_assoc($resultUserBookmarksGpIndividual)) {
                                ?>
                                <div class="item-list mb-3" id="bookmarked-gallery">
                                    <a href="galleryOverview.php?postID=<?php echo $userBookmarksGpIndividualRow['postID']; ?>"
                                        class="item">
                                        <span
                                            style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: inline-block; max-width: 80%;">
                                            <?php echo "<i>" . $userBookmarksGpIndividualRow['bookmarkedAt'] . "</i> | " . $userBookmarksGpIndividualRow['caption']; ?>
                                        </span>
                                    </a>
                                </div>
                                <?php
                            }
                        } else {
                            echo "<p>No bookmarked gallery posts found.</p>";
                        }
                        ?>
                    </div>

                </div>
            </section>
        </main>
    </div>

    <?php include '../shared/components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>