<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Tastebuds</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300..800&family=Rammetto+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="shared/assets/css/index.css">
    <link rel="stylesheet" href="shared/assets/css/navbar.css"/>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <header class="hero-section text-center text-white">
        <img src="shared/assets/image/mockup-pic.png" alt="Delicious food background">
        <div class="position-absolute top-50 start-50 translate-middle">
            <h1>Welcome to Tastebuds!</h1>
            <p>Your Ultimate Buddy for Food Exploration and Choices.</p>
            <button class="btn btn-warning py-2 px-4 fw-bold text-uppercase">Join Us</button>
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
                    <a href="#" class="btn text-white">Dig In and Discover!</a>
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
                <button class="generator-button">Find Out</button>
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
                <button class="gallery-button">Upload Now</button>
            </div>
        </div>
    </section>

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
                <div class="recipe-card">
                    <img src="shared/assets/image/mockup-pic.png" alt="Recipe Image" class="recipe-image">
                    <div class="overlay">
                        <span class="badge">Dinner</span>
                        <h3 class="recipe-title">Title of the Dish</h3>
                    </div>
                </div>

                <div class="recipe-card">
                    <img src="shared/assets/image/mockup-pic.png" alt="Recipe Image" class="recipe-image">
                    <div class="overlay">
                        <span class="badge">Dinner</span>
                        <h3 class="recipe-title">Title of the Dish</h3>
                    </div>
                </div>

                <div class="recipe-card">
                    <img src="shared/assets/image/mockup-pic.png" alt="Recipe Image" class="recipe-image">
                    <div class="overlay">
                        <span class="badge">Dinner</span>
                        <h3 class="recipe-title">Title of the Dish</h3>
                    </div>
                </div>

                <div class="recipe-card">
                    <img src="shared/assets/image/mockup-pic.png" alt="Recipe Image" class="recipe-image">
                    <div class="overlay">
                        <span class="badge">Dinner</span>
                        <h3 class="recipe-title">Title of the Dish</h3>
                    </div>
                </div>

                <div class="recipe-card">
                    <img src="shared/assets/image/mockup-pic.png" alt="Recipe Image" class="recipe-image">
                    <div class="overlay">
                        <span class="badge">Dinner</span>
                        <h3 class="recipe-title">Title of the Dish</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>

</html>