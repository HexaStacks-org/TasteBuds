<?php
include("connect.php");
session_start();

$userID = $_SESSION['userID'];

if (!empty($_SESSION['userID'])) {
} else {
    header("Location: login.php");
}

if (isset($_GET['id'])) {
    $requestedUserID = $_GET['id'];
    $firstName = $_GET['firstName'];
}

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Tastebuds</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300..800&family=Rammetto+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="shared/assets/css/index.css">
    <link rel="stylesheet" href="shared/assets/css/navbar.css" />
    <link rel="stylesheet" href="shared/assets/css/footer.css">
</head>

<body>
    <?php include 'shared/components/notLoggedInNavbar.php';?>
    <header class="hero-section text-center text-white">
        <img src="shared/assets/image/mockup-pic.png" alt="Delicious food background">
        <div class="position-absolute top-50 start-50 translate-middle">
            <h1>Welcome to Tastebuds!</h1>
            <p>Your Ultimate Buddy for Food Exploration and Choices.</p>
            <a href="login.php" class="btn generator-button py-2 px-4 fw-bold text-uppercase">Join Us</a>
        </div>
    </header>

    <section class="recipes-section">
        <div class="container">
            <div class="recipes-card"
                style="background: url('shared/assets/image/mockup-pic.png') no-repeat center center / cover;">
                <div class="recipes-content">
                    <h2>Check Out These Recipes</h2>
                    <p>Explore a variety of flavorful recipes for every meal—perfect for quick bites or indulgent
                        feasts.</p>
                    <a href="foodListings.php" class="btn generator-button">Dig In and Discover!</a>
                </div>
            </div>
        </div>
    </section>

    <section class="random-generator">
        <div class="generator-card">
            <img src="shared/assets/image/mockup-pic.png" alt="Random generator food" class="generator-image">
            <div class="generator-content">
                <h3 class="generator-title">Random Generator</h3>
                <p class="generator-text">Get spontaneous food inspiration with random picks.</p>
                <a href="foodgenerator.php" class="btn generator-button">Find Out</a>
            </div>
        </div>
    </section>

    <section class="gallery">
        <div class="gallery-card">
            <img src="shared/assets/image/mockup-pic.png" alt="Gallery food inspiration" class="gallery-image">
            <div class="gallery-content">
                <h3 class="gallery-title">Share Your Creations</h3>
                <p class="gallery-text">Share your culinary creations in our gallery—upload food photos with a title and
                    caption to inspire others!</p>
                <a href="gallery.php" class="btn gallery-button">Upload Now</a>
            </div>
        </div>
    </section>

    <!-- Top 5 Recipes -->
    <section class="top-recipes-section">
        <div class="container">
            <div class="recipes-grid">
                <!-- Recipe Card Template -->
                <div class="intro">
                    <h2 class="recipes-title">Top 5 Recipes</h2>
                    <p class="recipes-description">Discover our must-try dishes, handpicked for their flavor and
                        popularity—perfect for any meal!</p>
                </div>

                <!-- Duplicate as needed for additional cards -->
                <?php
                if (mysqli_num_rows($resultTopRecipes) > 0) {
                    while ($topRecipesRow = mysqli_fetch_assoc($resultTopRecipes)) {
                        ?>

                        <a href="recipeOverview.php?recipeID=<?php echo $topRecipesRow['recipeID']; ?>">
                            <div class="recipe-card" style="height: 300px;">
                                <div class="col" style="height: 100%; padding: 0;">
                                    <img src="shared/assets/image/content-image/<?= $topRecipesRow['imageURL'] ?>"
                                        alt="Recipe Image" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>

                                <div class="overlay">
                                    <span class="badge"><?php echo $topRecipesRow['primaryCategoryName'] ?></span>
                                    <h3 class="recipe-title"><?php echo $topRecipesRow['recipeTitle'] ?></h3>
                                </div>
                            </div>
                        </a>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <?php include 'shared/components/notLoggedInFooter.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>