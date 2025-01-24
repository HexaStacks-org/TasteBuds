<?php
include("../shared/processes/session.php");
session_start();

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];

    // SQL query to get user information (first name, last name)
    $queryUserIndividual = "
    SELECT DISTINCT users.userID, users.firstName, users.lastName
    FROM users
    WHERE users.userID = $userID;
    ";

    $resultUserIndividual = executeQuery($queryUserIndividual);
    $user = mysqli_fetch_assoc($resultUserIndividual);

    // INDIVIDUAL LIST OF LIKES PER USER
    // Query for User Liked Records (RECIPES)
    $queryUserLikesRcIndividual = "
    SELECT likes.*, users.userID AS userLikerID, users.firstName, users.lastName, recipes.*
    FROM likes
    LEFT JOIN users ON users.userID = likes.userID 
    LEFT JOIN recipes ON recipes.recipeID = likes.recipeID
    WHERE likes.recipeID >= 1 AND likes.userID = $userID;
    ";

    $resultUserLikesRcIndividual = executeQuery($queryUserLikesRcIndividual);

    // Query for User Liked Records (GALLERY POSTS)
    $queryUserLikesGpIndividual = "
    SELECT likes.*, users.userID AS userLikerID, users.firstName, users.lastName, galleryposts.*
    FROM likes
    LEFT JOIN users ON users.userID = likes.userID 
    LEFT JOIN galleryposts ON galleryposts.postID = likes.postID
    WHERE likes.postID >= 1 AND likes.userID = $userID;
    ";

    $resultUserLikesGpIndividual = executeQuery($queryUserLikesGpIndividual);

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
                <?php echo htmlspecialchars(strtoupper($user['firstName']) . ' ' . strtoupper($user['lastName'])); ?>
            </h1>

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
                    } else {
                        echo "<p>No liked recipes found.</p>";
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
                                <a href="galleryOverview.php?postID=<?php echo $userLikesRowIndividualGp['postID']; ?>"
                                    class="item">
                                    <span
                                        style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: inline-block; max-width: 80%;">
                                        <?php echo "<i>" . $userLikesRowIndividualGp['likedAt'] . "</i> | " . $userLikesRowIndividualGp['caption']; ?>
                                    </span>
                                </a>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<p>No liked gallery posts found.</p>";
                    }
                    ?>
                </div>

            </div>
        </section>
    </div>

    <?php include '../shared/components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>